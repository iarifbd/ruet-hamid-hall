/* Create Student Ledger Table */

CREATE TABLE [dbo].[studentledger] (
    [id] INT IDENTITY(1,1) NOT NULL PRIMARY KEY,            -- Auto-increment, not nullable
    [gdate] date NOT NULL,                                  -- Required field
    [ldate] date NOT NULL DEFAULT '1900-01-01',             -- Required field
    [tdate] date NOT NULL DEFAULT '1900-01-01',             -- Required field
    [S_Id] INT NOT NULL,                                    -- Required field
    [description] NVARCHAR(255) NOT NULL,                   -- Required field
    [acctype] NVARCHAR(50) NOT NULL,                        -- Required field
    [achead] NVARCHAR(50) NOT NULL,                         -- Required field
    [dr] DECIMAL(10, 2) NOT NULL,                           -- Required field
    [cr] DECIMAL(10, 2) NOT NULL,                           -- Required field
    [balance] DECIMAL(10, 2) NOT NULL,                      -- Required field
    [status] NVARCHAR(50) NOT NULL      
);





/*_______________________________Add data to Ledger For HC___________________________*/


INSERT INTO [studentledger] 
    (gdate, ldate, tdate, S_Id, description, acctype, achead, dr, cr, balance, status)
SELECT 
    BillMonth AS gdate,              -- Use BillMonth for gdate
    '1900-01-01' AS ldate,           -- Provide a default date for ldate
    BillMonth AS tdate,              -- Use BillMonth for tdate
    S_Id,                            -- Student ID
    PurposeBill AS description,      -- Use PurposeBill for description
    'Dr' AS acctype,                 -- Set acctype as 'Dr' (debit)
    'HC' AS achead,                  -- Set achead as 'HC'
    BillAmount AS dr,                -- Use BillAmount for the debit amount
    0.00 AS cr,                      -- Set credit amount to 0
    BillAmount AS balance,           -- Set balance equal to BillAmount
    CASE 
        WHEN PaymentStatus = 'Yes' THEN 'Paid' 
        ELSE 'Due' 
    END AS status                    -- Set status based on PaymentStatus
FROM 
    StudentAccount
ORDER BY 
    BillMonth;





/*______________________________For Fine _________________________________________________*/

INSERT INTO [studentledger] 
    (gdate, ldate, tdate, S_Id, description, acctype, achead, dr, cr, balance, status)
SELECT 
    BillMonth AS gdate,              -- Use BillMonth for gdate
    '1900-01-01' AS ldate,           -- Provide a default date for ldate
    BillMonth AS tdate,              -- Use BillMonth for tdate
    S_Id,                            -- Student ID
    PurposeBill AS description,      -- Use PurposeBill for description
    'Dr' AS acctype,                 -- Set acctype as 'Dr' (debit)
    'F' AS achead,                  -- Set achead as 'HC'
    Fine AS dr,                -- Use BillAmount for the debit amount
    0.00 AS cr,                      -- Set credit amount to 0
    Fine AS balance,           -- Set balance equal to BillAmount
    CASE 
        WHEN PaymentStatus = 'Yes' THEN 'Paid' 
        ELSE 'Due' 
    END AS status                    -- Set status based on PaymentStatus
FROM 
    StudentAccount
ORDER BY 
    BillMonth;





/*______________________________For Collections _________________________________________________*/

INSERT INTO [studentledger] 
    (gdate, ldate, tdate, S_Id, description, acctype, achead, dr, cr, balance, status)
SELECT 
    -- Convert pd.Date to DATETIME safely, and provide a fallback default date for invalid dates
    COALESCE(TRY_CAST(pd.Date AS DATETIME), '1900-01-01') AS gdate,  -- Use '1900-01-01' if conversion fails
    '1900-01-01' AS ldate,                                          -- Provide a default date for ldate
    COALESCE(TRY_CAST(pd.Date AS DATETIME), '1900-01-01') AS tdate,  -- Use '1900-01-01' if conversion fails
    sa.S_Id,                                                         -- Student ID from StudentAccount
    'Payment Deposited' AS description,                               -- Description as 'Payment Deposited'
    'Cr' AS acctype,                                                 -- Set acctype as 'Cr' (credit)
    'P' AS achead,                                                   -- Set achead as 'P'
    0.00 AS dr,                                                      -- Debit amount is 0
    pd.Amount AS cr,                                                 -- Credit amount from Payment_Datewise
    pd.Amount AS balance,                                            -- Balance equal to Amount
    CASE 
        WHEN pd.Amount = 0 THEN 'Due'                                -- Status 'Due' if Amount is 0
        ELSE 'Paid' 
    END AS status                                                    -- Set status based on Amount
FROM 
    StudentAccount sa
JOIN 
    Payment_Datewise pd ON sa.S_Id = pd.S_Id
WHERE 
    TRY_CAST(pd.Date AS DATETIME) IS NOT NULL                       -- Only include valid dates
ORDER BY 
    sa.BillMonth;






/*__________________________Reset ID Number___________________________________*/


-- Step 1: Create a new table with the same structure but with an identity column
CREATE TABLE [dbo].[studentledger_new] (
    [id] INT IDENTITY(1,1) NOT NULL PRIMARY KEY,            -- Auto-increment, not nullable
    [gdate] date NOT NULL,                                  -- Required field
    [ldate] date NOT NULL DEFAULT '0000-00-00',             -- Required field
    [tdate] date NOT NULL DEFAULT '0000-00-00',             -- Required field
    [S_Id] INT NOT NULL,                                    -- Required field
    [description] NVARCHAR(255) NOT NULL,                   -- Required field
    [acctype] NVARCHAR(50) NOT NULL,                        -- Required field
    [achead] NVARCHAR(50) NOT NULL,                         -- Required field
    [dr] DECIMAL(18, 2) NOT NULL,                           -- Required field
    [cr] DECIMAL(18, 2) NOT NULL,                           -- Required field
    [balance] DECIMAL(18, 2) NOT NULL,                      -- Required field
    [status] NVARCHAR(50) NOT NULL      
);

-- Step 2: Insert data into the new table, generating the new ID
INSERT INTO [dbo].[studentledger_new] (gdate, ldate, tdate, S_Id, description, acctype, achead, dr, cr, balance, status)
SELECT gdate, ldate, tdate, S_Id, description, acctype, achead, dr, cr, balance, status
FROM [dbo].[studentledger]
ORDER BY gdate, S_Id;

-- Step 3: Drop the old table
DROP TABLE [dbo].[studentledger];

-- Step 4: Rename the new table to the original table name
EXEC sp_rename 'dbo.studentledger_new', 'studentledger';



-----------------SQL FOR SUM------------------------
SELECT
    SUM(CASE WHEN achead = 'F' THEN dr ELSE 0 END) AS SUM_F,
    SUM(CASE WHEN achead = 'HC' THEN dr ELSE 0 END) AS SUM_HC,
    SUM(dr) AS SUM_dr,
    SUM(cr) AS SUM_cr
FROM studentledger
WHERE S_Id = '1701031';