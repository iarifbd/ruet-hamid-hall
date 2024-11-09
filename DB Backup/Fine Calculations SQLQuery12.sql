-- Temporary table to store new bill entries with all columns required
DECLARE @NewBills TABLE (
    gdate DATE,
    ldate DATE,       -- Add column for ldate
    tdate DATE,       -- Add column for tdate
    S_Id INT,
    description NVARCHAR(255),
    acctype NVARCHAR(10),
    achead NVARCHAR(10),
    dr DECIMAL(18,2),
    cr DECIMAL(18,2),
    balance DECIMAL(18,2),
    status NVARCHAR(10)
);

-- Insert fines based on month difference between BillMonth and current BillMonth (gdate)
INSERT INTO @NewBills (gdate, ldate, tdate, S_Id, description, acctype, achead, dr, cr, balance, status)
SELECT 
    sa.BillMonth AS gdate,  -- Use BillMonth as the reference date (gdate)
    EOMONTH(sa.BillMonth) AS ldate,  -- Last date of the BillMonth
    sa.BillMonth AS tdate,  -- BillMonth as the transaction date
    sa.S_Id,
    'Delay Fine on ' + CONVERT(NVARCHAR, sa.BillMonth) + ' (for ' + 
        CONVERT(NVARCHAR, DATEDIFF(MONTH, sa.BillMonth, GETDATE())) + ' Month): ' + 
        CONVERT(NVARCHAR, DATEDIFF(MONTH, sa.BillMonth, GETDATE()) * 5) AS description,
    'Dr' AS acctype,
    'DF' AS achead,
    DATEDIFF(MONTH, sa.BillMonth, GETDATE()) * 5.00 AS dr,
    0.00 AS cr,
    DATEDIFF(MONTH, sa.BillMonth, GETDATE()) * 5.00 AS balance,
    'Due' AS status
FROM 
    StudentAccount sa
WHERE 
    sa.BillMonth < GETDATE();  -- Insert only if BillMonth is before today's date (GETDATE())

-- Select the results from the temporary table (New Bills)
SELECT * FROM @NewBills;
