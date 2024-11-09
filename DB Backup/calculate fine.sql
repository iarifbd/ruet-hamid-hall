WITH FineCalculation AS (
    SELECT
        sa.S_Id,                               -- Student ID
        sa.BillMonth AS gdate,                 -- BillMonth as gdate
        EOMONTH(sa.BillMonth) AS ldate,        -- Last date of the BillMonth (end of the month)
        sa.PurposeBill AS description,         -- PurposeBill as description
        sa.Fine AS fineAmount,                 -- Fine amount from the StudentAccount table
        sa.PaymentStatus,                      -- PaymentStatus (Yes/No)
        -- Calculate the number of months between BillMonth and current date (gdate)
        DATEDIFF(MONTH, sa.BillMonth, GETDATE()) AS monthCount
    FROM
        StudentAccount sa
    WHERE
        sa.PaymentStatus = 'No'  -- Only those with 'Due' status
        AND sa.PurposeBill IS NOT NULL  -- Assuming we need PurposeBill to be non-NULL
)

INSERT INTO studentledger
    (gdate, ldate, tdate, S_Id, description, acctype, achead, dr, cr, balance, status)
SELECT
    GETDATE() AS gdate,                         -- Use gdate from the CTE
    EOMONTH(GETDATE()) AS ldate,                         -- Use ldate from the CTE
    GETDATE() AS tdate,                   -- Set tdate to NULL as per your logic
    f.S_Id,                          -- Student ID
    'Delay Fine on ' + f.description + ' (for ' + CAST(f.monthCount AS VARCHAR) + ' Month): '+CAST(f.monthCount AS VARCHAR)+'x 5 ='+ + CAST(f.fineAmount AS VARCHAR) AS description,  -- Description
    'Dr' AS acctype,                 -- Debit type
    'DF' AS achead,                  -- Delay fine head
    f.fineAmount AS dr,              -- Debit amount (fineAmount)
    0.00 AS cr,                      -- Credit amount (set to 0)
    f.fineAmount AS balance,         -- Set balance as fineAmount
    'Due' AS status                  -- Status as 'Due'
FROM
    FineCalculation f
ORDER BY
    f.gdate;
