PHP-Banking Application

Aim:
Consider a Banking application. Develop a PHP program that will validate the controls in
the forms you have created for the application. State the assumptions you make (business logic
you are taking into consideration). Note: Your application must access a database using PHP
Functionalities:
1. Displaying customer information
2. Displaying account information
3. Inserting customer information
4. Inserting account information
Procedure:
Relations using MYSQL for a banking application given below enforcing primary
constraints: CUSTOMER (CID, CNAME)
ACCOUNT (ANO, ATYPE, BALANCE, CID)
An account can be a savings account or a current account. Check ATYPE in 'S' or
'C'. A customer can have both types of accounts.
TRANSACTION (TID, ANO, TTYPE, TDATE, TAMOUNT)
TTYPE can be „D‟ or „W‟ (D- Deposit; W – Withdrawal)
1. Open MySQL.
2. Create a database.
3. Connect to the database.
4. Create the tables.
