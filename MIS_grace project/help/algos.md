**database design**

users table
    fields
        userid number primary key auto_increment,
        usertype text,
        username text,
        userpassword varchar(25)

recommendations table
    fields
        id number primary key auto_increment,
        userid number,
        bname text,
        age number,
        gender text,
        BCnumber number,
        Description text,
        medicalstatus text,
        amountrequired number,
        startdate date,
        enddate date,
        residence text,
        status text

beneficiaries table
    fields
        benid number primary key auto_increment,
        bname text,
        age number,
        gender text,
        BCnumber number,
        Description text,
        medicalstatus text,
        amountrequired number,
        startdate date,
        enddate date,
        lastfunddate date,
        residence text

deposits table
    fields
        depoid number primary key auto_increment,
        userid number,
        depoamount number,
        depodate date,
        code text,
        status text

transactions table
    fields
        transid number primary key auto_increment,
        benid number,
        bname text,
        transamount number,
        transdate date,
        code text

-----------------------------------------------------------------

**algos**

connection guy
    write a php code that handles a database connection. make it that it checks if the specified database exists and creates it if it doesnt. make the variable for database connection be named conn

system setup
    consider{
        all database connection is handled by a file at "actions/connect.php",
        the code will check for and make the tables one by one, not as a single operation
    }
    write a php code that checks if tables called users, recommendations, beneficiaries, deposits, transactions exist in a database.
    if they dont the code creates the tables with these fields(
        users table
            fields
                userid number primary key auto_increment,
                usertype text,
                username text,
                userpassword varchar(25)

        recommendations table
            fields
                id number primary key auto_increment,
                userid number,
                bname text,
                age number,
                gender text,
                BCnumber number,
                Description text,
                medicalstatus text,
                amountrequired number,
                startdate date,
                enddate date,
                residence text,
                status text

        beneficiaries table
            fields
                benid number primary key auto_increment,
                bname text,
                age number,
                BCnumber number,
                Description text,
                medicalstatus text,
                amountrequired number,
                startdate date,
                enddate date,
                lastfunddate date,
                residence text

        deposits table
            fields
                depoid number primary key auto_increment,
                userid number,
                depoamount number,
                depodate date,
                code text,
                status text

        transactions table
            fields
                transid number primary key auto_increment,
                benid number,
                bname text,
                transamount number,
                transdate date,
                code text
    )
    as a special case if the users table doesnt exist, add the record ("admin","admin","123") as the usertype, username and userpassword respectively after creating it

newuser algo
    consider that {
        a table called users exists and has these fields (userid, usertype, username,userpassword),
        this data has been passed via post (uname,upass),
        there is a cookie called "curusertype" that can either be "sponsor" or "admin",
        all database connection is handled by connect.php on the same folder,
        the connection variable is conn
    }
    create a php script that checks if the post variables have been passed
    if they have{
        it checks if theres a record in the users table that has the same username as uname. if the record exists{
            an alert saying "user already exists, try a different username"
        } otherwise {
            add a record to the users table in this format ("sponsor",uname,upass) as values for (usertype, username,userpassword) and informs the user if it worked. if it did {
                it checks if the "curusertype" is "admin". if it is it alerts that the record was added successfully and redirects to index.html after 3 seconds otherwise the code alerts the user to log in using the entered details
            }
        }
    }

login algo
    consider that {
        a table called users exists and has these fields (userid, usertype, username,userpassword),
        this data has been passed via post (uname,upass),
        all database connection is handled by connect.php on the same folder,
        the connection variable is conn
    }
    create a php script that checks if the post variables have been passed. if they have{
        check if theres a record in the users table that has the given uname as a username and informs the user if it exists. if it exists{
            the code checks if the value for userpassword is the same as upass and informs the user if it is. if it does{
                the code alerts "login successful" and then adds a new cookie called "curuser" and sets it to uname and another cookie "curusertype" set as the value in usertype in the record
            }
        }
    } and alerts the user if they havent

handledeposit algo
    consider that {
        a table called deposits exists and has these fields (depoid, userid, depoamount, depodate, code, status),
        this data has been passed via post (vcode,amount),
        theres a cookie called "curuser" that stores the username of the active user,
        all database connection is handled by connect.php on the same folder,
        the connection variable is conn
    }
    write a php code that checks if the post data has been passed. if it hasnt the code stops otherwise{
        it checks the users table to find the userid for the active user using the username cookie and stores it in a variable (theid). after this it adds a record to the table in this format (theid,amount,(the current date),vcode,"pending") as values for (userid,depoamount, depodate, code, status). it then informs the user if it was successful.
    } after all that it redirects the user to index.php after 4 seconds

sponsor summary algo
    consider that{
        the table recommendations exists and has these fields (id,userid,status),
        the table deposits exists and has these fields (userid,depoamount,status),
        the table users exists and has these fields (userid,username),
        theres a cookie called "curuser" that stores the username of the active user,
        the results of all these codes will be stored in variables for later use,
        all database connection is handled by connect.php on the same folder,
        the connection variable is conn
    }
    write a code that {
        find userid for the current user using the curuser cookie as the username and store it in (theid),
        find how many records in deposits table have the same userid as theid in the deposits table,
        find how many records in deposits table have the same userid as theid and have a status of "pending",
        find how many records in deposits table have the same userid as theid and have a status of "verified",
        find how many records in recommendations have the same userid as theid,
        find how many records in recommendations have the same userid as theid and have a status of "approved",
        find how many records in recommendations have the same userid as theid and have a status of "rejected",
        find how many records in deposits have the same userid as theid and have a status of "verified" then calculate the sum of depoamount
    }

view reco algo
    consider that {
        the table recommendations exists and has these fields(id,userid,bname,age,BCnumber,Description,medicalstatus,amountrequired,startdate,enddate,residence,status),
        theres a cookie called "curuser" that stores the username of the active user,
        theres a cookie called "curusertype" that can either be "sponsor" or "admin",
        the table users exists and has these fields (userid,username),
        all database connection is handled by connect.php on the same folder,
        the connection variable is conn
    }
    write a php code that checks the value of the "curusertype" cookie, if its sponsor{
        the code uses the curuser value as the username to find the corresponding userid in the users table and stores it as (theid). then it lists all records in recommendations table where userid is the same as theid
    } otherwise {
        it checks if a get variable called filter exists. if it does {
            if the filter value is "all"{
                the code lists all records from recommendations table. as it lists them in a table on the page it adds an extra column called actions. here if the value of status is "pending" it shows a button saying "approve" and another saying "reject" otherwise it shows a text saying "none available"
            } otherwise {
                the code lists all records from recommendations table where status is "pending". as it lists them in a table on the page it adds an extra column called actions which shows a button saying "approve"
            }
        } otherwise {
            the code lists all records from recommendations table. as it lists them in a table on the page it adds an extra column called actions. here if the value of status is "pending" it shows a button saying "approve" otherwise it shows a text saying "none available"
        }
    }

view deposits algo
    consider that {
        a table called deposits exists and has these fields (depoid, userid, depoamount, depodate, code, status),
        this data has been passed via post (vcode,amount),
        theres a cookie called "curuser" that stores the username of the active user,
        theres a cookie called "curusertype" that can either be "sponsor" or "admin",
        all database connection is handled by connect.php on the same folder,
        the connection variable is conn
    }
    write a php code that checks the value of "curusertype". if its sponsor{
        the code uses the curuser value as the username to find the corresponding userid in the users table and stores it as (theid). then it lists all records in deposits table where userid is the same as theid
    } otherwise {
        it checks if a get variable called filter exists. if it does {
            if the filter value is "all"{
                the code lists all records from deposits table. as it lists them in a table on the page it adds an extra column called actions. here if the value of status is "pending" it shows a button saying "approve" and another saying "error" otherwise it shows a text saying "none available"
            } otherwise {
                the code lists all records from deposits table where status is "pending". as it lists them in a table on the page it adds an extra column called actions which shows a button saying "approve" and another saying "error"
            }
        } otherwise {
            the code lists all records from deposits table. as it lists them in a table on the page it adds an extra column called actions. here if the value of status is "pending" it shows a button saying "approve" and another saying "error" otherwise it shows a text saying "none available"
        }
    }

view beneficiaries
    consider that {
        the table beneficiaries exists and has these fields(bname, age, gender, BCnumber, Description, medicalstatus, amountrequired, startdate, enddate, lastfunddate, residence),
        theres a cookie called "curuser" that stores the username of the active user,
        theres a cookie called "curusertype" that can either be "sponsor" or "admin",
        all database connection is handled by connect.php on the same folder,
        the connection variable is conn
    }
    write a php code that checks if the value of the "curusertype" cookie is "admin". if it is{
        it lists all records from the beneficiaries table
    } otherwise it prints "you are not allowed to access this page"

new beneficiary
    consider that {
        the table beneficiaries exists and has these fields(bname, age, gender, BCnumber, Description, medicalstatus, amountrequired, startdate, enddate, lastfunddate, residence),
        post variables for (bname, age, gender, BCnumber, Description, medicalstatus, amountrequired, residence) have been passed,
        theres a cookie called "curuser" that stores the username of the active user,
        theres a cookie called "curusertype" that can either be "sponsor" or "admin",
        all database connection is handled by connect.php on the same folder,
        the connection variable is conn
    }
    write a php code that checks if the value of the "curusertype" cookie is "admin". if it is{
        it checks if all the post variables are present and stops running if any is missing giving an appropriate error response. provided everything is given it then adds a new record to the beneficiaries table in this format (bname, age, gender, BCnumber, Description, medicalstatus, amountrequired, (today's date), (the date 4 years into the future), residence) as values for (bname, age, gender, BCnumber, Description, medicalstatus, amountrequired, startdate, enddate, residence) respectively. it then alerts the user if it was successful and redirects to index.html after 2 seconds
    } otherwise it prints "you are not allowed to access this page"

allocate funds
    consider that {
        a table called deposits exists and has these fields (depoid, userid, depoamount, depodate, code, status),
        the table beneficiaries exists and has these fields(bname, age, gender, BCnumber, Description, medicalstatus, amountrequired, startdate, enddate, lastfunddate, residence),
        theres a cookie called "curuser" that stores the username of the active user,
        theres a cookie called "curusertype" that can either be "sponsor" or "admin",
        all database connection is handled by connect.php on the same folder,
        the connection variable is conn
    }
    write a php code that checks if the value of the "curusertype" cookie is "admin". if it is{
        it lists all records from the beneficiaries table and adds an extra column called actions where theres a button for "allocate funds".
        it then finds the total amount in depoamount field in deposits table where status is "verified" and stores it as (availablecash)
    } otherwise it prints "you are not allowed to access this page"

allocate funds system algo
    consider that{
        the table beneficiaries exists and has these fields(benid, bname, age, gender, BCnumber, Description, medicalstatus, amountrequired, startdate, enddate, lastfunddate, residence),
        a table called transactions exists and has these fields(transid,benid,bname,transamount,transdate,code),
        a table called deposits exists and has these fields (depoid, userid, depoamount, depodate, code, status),
        this data has been passed via post (kidid),
    }
    write a php code that checks if the post variable was passed. if it was{
        calculates the total amount in the treasury provided that its the total amount in depoamount field in deposits table where status is "verified" and stores in as (deposamt).
        calculates the total amount used provided that its the total amount in transamount in transactions table and stores in as (transamt).
        calculates (maxamt) provided its (deposamt) - (transamt)
        then it checks if theres a record in beneficiaries where benid is the same as kidid. if there is{
            it gets the value of amountrequired and stores it as (togive) and that of bname as (kidname). then it checks if (maxamt) is less than (togive). if it is {
                it creates a string composed of 8 randomly generated alphanumeric characters and stores it as (thecode)
                it adds a new record in the transactions table in this format (kidid,kidname,togive,(today's date),(thecode)) as values for (benid,bname,transamount,transdate,code). it then informs the user if it was successful.
            } otherwise it prints "inadequate funds".
        }
    } otherwise the code alerts the user.
    after all this the code redirects to index.html after 3 seconds

list transactions
    consider that{
        the table beneficiaries exists and has these fields(benid, bname, age, gender, BCnumber, Description, medicalstatus, amountrequired, startdate, enddate, lastfunddate, residence),
        a table called transactions exists and has these fields(transid,benid,bname,transamount,transdate,code),
        theres a cookie called "curusertype" that can either be "sponsor" or "admin",
        all database connection is handled by connect.php on the same folder,
        the connection variable is conn
    }
    write a php code that checks if the value of the "curusertype" cookie is "admin". if it is{
        it lists all records from the transactions table.
        it then finds the total amount in transamount field in the transactions table and stores it in a variable (totalgiven)
    } otherwise it prints "you are not allowed to access this page"

beneficiary info algo
    consider that{
        the table beneficiaries exists and has these fields(benid, bname, age, gender, BCnumber, Description, medicalstatus, amountrequired, startdate, enddate, lastfunddate, residence),
        all database connection is handled by connect.php on the same folder,
        the connection variable is conn
    }
    write a php code that checks if the get variable for kidid has been passed. if it has {
        the code checks the beneficiaries table to see if theres a record where benid matches kidid. if there is{
            it takes all the fields and stores them as variables for later use (its assumed that theres only 1 record for each unique id)
        } otherwise it prints "beneficiary not found"
    }

list users algo
    consider that {
        a table called users exists and has these fields (userid, usertype, username,userpassword),
        all database connection is handled by connect.php on the same folder,
        the connection variable is conn
    }
    write a php code that shows all records in the uses table.

logout algo
    consider{
        there are 3 cookies set "curuser" and "curusertype" and "curuserid"
    }
    write a php code tha deletes all 3 cookies and redirects