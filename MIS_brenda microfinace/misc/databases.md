***records design***

**loans**
    fields
        loanid number primary key auto_increment,
        loanholder text,
        loanamount number,
        loanguarantors text,
        dateapplied datetime,
        dateapproved datetime,
        dateverified datetime,
        amountpaid number,
        paymentcode text,
        status text

**deposits**
    fields
        depoid  number primary key auto_increment,
        depoamt number,
        depoholder text,
        depodate datetime,
        depostatus text

**withdrawals**
    fields
        wdid  number primary key auto_increment,
        wdamt number,
        wdholder text,
        wddate datetime

**savings**
    fields
        saveid  number primary key auto_increment,
        saveamt number,
        saveholder text,
        savestatus text,
        updatedates text,
        savestartdadte datetime

**customers**
    fields
        custid  number primary key auto_increment,
        custname text,
        custpassword text,
        custcontact varchar(25),
        custstatus text

**users**
    fields
        userid  number primary key auto_increment,
        username text,
        userpassword text,
        datecreated datetime

**usagelogs**
    fields
        logid  number primary key auto_increment,
        logdate datetime,
        logcontents text