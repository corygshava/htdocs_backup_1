**tables design**

users table
	fields
		userid
		username text,
		userpassword text,
		usertype text,
		usercontact text,
		dateadded datetime

events
	fields
		eventid
		eventname text,
		eventcreator text,
		eventdate datetime,
		starttime time,
		endtime time,
		ticketcost number,
		description text,
		venue text,
		themecolor number,
		eventkey text,
		eventcode text

performers
	fields
		recid
		eventid int,
		pname text,
		role text,
		starttime time,
		endtime time,
		checkedin text

vendors
	fields
		recid
		eventid int,
		vname text,
		role text,
		description text,
		contact text

bookings
	fields
		recid
		eventid int,
		userid int,
		contact text,
		cname text,
		ticketcode text,
		checkedin text

tasks
	fields
		taskid
		eventid int,
		description text,
		assignedto text,
		duedate datetime,
		iscomplete text

algos

connection guy
	*copy grace's*

system setup
	*copy grace's*

login algo
	*copy grace's*

new user algo
	*copy grace's*

event creation
	consider that{
		the database connection is managed by a file 'connect.php' on the same folder,
		the connection variable is conn,
		the table called 'events' exists and has the following fields (eventname, eventdate, starttime, ,endtime, ticketcost, description, venue, themecolor, eventkey, eventcode),
		values for (eventname, eventdate, starttime, endtime, ticketprice, description, venue,themecolor) have been passed via post
	}
	write a php code that checks if all the required fields have been passed. if they have been passed {
		add a new record into the events table in the format (eventname, eventdate, starttime, ,endtime, ticketprice, description, venue, themecolor, (a randomly generated 4 letter string), (another randomly generated 4 letter string)) as values for (eventname, eventdate, starttime, ,endtime, ticketcost, description, venue, themecolor, eventkey, eventcode) respectively. it then informs the user it it was successful or not
	} otherwise stop the code and inform the user

assign performer
	consider that{
		the database connection is managed by a file 'connect.php' on the same folder,
		the connection variable is conn,
		a table called performers exist and has these fields (eventid, pname, role, starttime, endtime, checkedin),
		values for (eventid, pname, role, starttime, endtime) have been passed via post
	}
	write a php code that checks if all the required fields have been passed. if they have{
		add a new record into the performers table in this format (eventid, pname, role, starttime, endtime, "no") as values for (eventid, pname, role, starttime, endtime, checkedin) respectively. it then informs the user if it worked and redirects to index.html after 4 seconds
	} otherwise stop the code and inform the user

add vendor algo
	consider that{
		the database connection is managed by a file 'connect.php' on the same folder,
		the connection variable is conn,
		a table called vendors exist and has these fields (eventid, vname, role, description, contact),
		values for (eventid, vname, role, description, contact) have been passed via post
	}
	write a php code that checks if all the required fields have been passed. if they have{
		add a new record into the table using the appropriate fields. it then informs the user if it worked and redirects to index.html after 4 seconds
	} otherwise stop the code and inform the user

add task algo
	consider that{
		the database connection is managed by a file 'connect.php' on the same folder,
		the connection variable is conn,
		a table called tasks exist and has these fields (eventid, description, assignedto, duedate, iscomplete),
		values for (eventid, description, assignedto, duedate) have been passed via post
	}
	write a php code that checks if all the required fields have been passed. if they have{
		add a new record into the table in this format (eventid, description, assignedto, duedate, "no"), as values for (eventid, description, assignedto, duedate, iscomplete) respectively. it then informs the user if it worked and redirects to index.html after 4 seconds
	} otherwise stop the code and inform the user

view performers algo
	consider that{
		the database connection is managed by a file 'connect.php' on the same folder,
		the connection variable is conn,
		a table called performers exist and has these fields (eventid, pname, role, starttime, endtime, checkedin),
		theres a cookie called "curevent" that holds the current eventid
	}
	create a php code checks if the cookie exists and if it does lists all records in the performers table where eventid is the same as the cookie (in the created table add a row that has a button written "fire performer"). otherwise it writes "no event chosen"

view vendors algo
	consider that{
		the database connection is managed by a file 'connect.php' on the same folder,
		the connection variable is conn,
		a table called vendors exist and has these fields (eventid, vname, role, description, contact),
		theres a cookie called "curevent" that holds the current eventid
	}
	create a php code checks if the cookie exists and if it does{
		lists all records in the vendors table where eventid is the same as the cookie. in the created table add a row that has a button written "assign task".
	} otherwise it writes "no event chosen"

view tasks
	consider that{
		the database connection is managed by a file 'connect.php' on the same folder,
		the connection variable is conn,
		a table called tasks exist and has these fields (eventid, description, assignedto, duedate, iscomplete),
		theres a cookie called "curevent" that holds the current eventid
	}
	create a php code checks if the cookie exists and if it does{
		lists all records in the tasks table where eventid is the same as the cookie. in the created table add a row that has a button written "mark as done" and another "mark as failed" if the value for iscomplete is "no".
	} otherwise it writes "no event chosen" 

view attendees
	consider that{
		the database connection is managed by a file 'connect.php' on the same folder,
		the connection variable is conn,
		a table called bookings exist and has these fields (eventid, contact, cname, ticketcode, checkedin),
		the table called 'events' exists and has the following fields (eventid, eventname, eventdate),
		theres a cookie called "curevent" that holds the current eventid
	}
	create a php code checks if the cookie exists and if it does{
		it checks if the current date is the same as the corresponding one in the events table. if it does it sets a variable called "$iseventday" to true.
		lists all records in the bookings table where eventid is the same as the cookie. in the created table add a row that has a button written "check in" if the value for $iseventday is "true".
	} otherwise it writes "no event chosen"

list events
	consider that{
		the database connection is managed by a file 'connect.php' on the same folder,
		the connection variable is conn,
		the table called 'events' exists and has the following fields (eventid, eventname, eventdate, starttime, ,endtime, ticketcost, description, venue, themecolor, eventkey, eventcode),
		a get variable for filter has been passed
	}
	write a php code that lists all events in the table{
		if the value of filter is "all" it lists all events,
		if the value is "passed" it lists all events where the date is in the past,
		if the value is "today" it lists all events where the date is today,
		if the value is "upcoming" it lists all events where the date is in 2 weeks or less,
		if the value is "available" it lists all events where the date has not yet passed,
		if it doesnt exist or is null it just lists all events in the future
	}

show event info
	consider that{
		the database connection is managed by a file 'connect.php' on the same folder,
		the connection variable is conn,
		the table called 'events' exists and has the following fields (eventid, eventname, eventdate, starttime, ,endtime, ticketcost, description, venue, themecolor, eventkey, eventcode),
		theres a get variable called "curevent" that holds the current eventid
	}
	write a php code that shows all the information for the event with the corresponding eventid

---------on me

show events im in
	considre that{
		theres a table for bookings that has (eventid,userid)
	}
	then list all records in bookings where cname matches "curuser" cookie. then get the eventid of each booking record
	then get event data from events table using the discovered eventid

check if you've booked
	considre that{
		theres a table for bookings that has (eventid,userid)
	}
	find if theres a record in bookings where cname matches "curuser" cookie. if there is print "event booked"

book an event
	consider that{
		theres a table for bookings that has (eventid,userid,contact, cname, ticketcode, checkedin),
		theres a cookie for "curuser",
	}
	pass the eventid as a get variable.
	first find the userid and usercontact using the given curuser as the username in the users table.
	add a record to bookings in this format (eventid,userid,usercontact, curuser, (random 4 letter string), "no") as values for (eventid,userid,contact, cname, ticketcode, checkedin)

select event
	it just takes the get variable for current event and sets it as the value for the curevent cookie