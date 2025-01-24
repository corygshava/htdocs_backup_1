***Records design (Joy's project)***

***NEW DATABASE SCHEME***

users
    fields
        userid  number primary key auto_increment,
        username text,
        userpassword text,
        datecreated datetime
patients
    fields
        patientid number primary key auto_increment,
        patientname text,
        patientContact text,
        idnumber number,
        registrationdate datetime,
        lastvisit datetime
visits
    fields
        visitid number primary key auto_increment,
        visitserial text,
        patientidnumber number,
        facilityused text,
        visistdate datetime,
        doctorsRemarks text,
        dateverified datetime,
        visitstatus text
appointments
    fields
        appointmentid number primary key auto_increment,
        appointmentserial text,
        appointmentdate datetime,
        facility text,
        patientidnumber number,
        appointmentstatus text
inventory
    fields
        itemid number primary key auto_increment,
        itemname text,
        itemquantity number,
        dateadded datetime,
        dateupdated datetime,
        updatelog text
facilities
    fields
        facid number primary key auto_increment,
        facname text,
        dateadded datetime