SELECT 
    ROW_NUMBER() OVER (ORDER BY BillMonth) AS id,  -- Generate an incremental ID
    BillMonth AS gdate,                          -- Use BillMonth for gdate
    NULL AS ldate,                               -- Set ldate as NULL (adjust if needed)
    BillMonth AS tdate,                          -- Use BillMonth for tdate
    S_Id,                                        -- Student ID
    PurposeBill AS description,                  -- Use PurposeBill for description
    'Dr' AS acctype,                             -- Set acctype as 'Dr' (debit)
    'HC' AS achead,                              -- Set achead as 'HC'
    BillAmount AS dr,                            -- Use BillAmount for the debit amount
    0.00 AS cr,                                  -- Set credit amount to 0
    BillAmount AS balance,                       -- Set balance equal to BillAmount
    CASE 
        WHEN PaymentStatus = 'Yes' THEN 'Paid' 
        ELSE 'Due' 
    END AS status                               -- Set status based on PaymentStatus
FROM 
    StudentAccount
ORDER BY 
    BillMonth;
