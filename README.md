# Athona
Athona is a course registration website meant to be a simple version of UGA's website Athena. Students can add and drop courses and edit their major. Professors can edit their course times and locations as well as view the students enrolled in their course. Finally, Admin has access to a list of all students and professors which they are able to edit, add or delete. Admin can also view a table of statistics about the college. This website was created and formatted using HTML, CSS, PHP, and MySQL. 

## Usage
**To log in as an admin:**
	
	Username: admin
	
	Password: admin1
	
	
**To log in as a professor:**
	
	Username: psmith
	
	Password: patrick2
	
	
**To log in as a student:**
	
	Username: eshaw
	
	Password: eliana3

Note: the usernames and passwords for all users can be found in the database.

## Features
###### Admin Page
The admin page contains two lists: all students enrolled and all professors. These lists are generated dynamically by pulling information from the database using a PHP foreach loop. The admin has the ability to add, delete, and edit both students and professors. Adding, deleting, and editing changes the database directly. 

At the bottom of the admin page is a table of statistics. These statistics were calculated using SQL Queries, PHP loops, and PDO Statements. 

###### Professor Page
The professor page has a small section with information about the professor who logged in (name and ID). There is a course list where the professor can view the courses they are teaching. This list gives the course name, ID, time, location, and number of students enrolled. The number of students enrolled is calculated with a simple SQL Query and row count. Hovering over this number will display the names of the students in the course. All other information is displayed dynamically by pulling information from the database.

Professors have the ability to edit their course times and locations. The professor can change the location to anything listed in the dropdown menu with no validation checks. When the professor changes the time, however, if there is a time conflict (they have another class at the same time), an error message is displayed and the time is not changed.

###### Student Page
The student page has a small section with information about the student who logged in (name, ID, and major). Students are able to edit their major, view a list of all available courses, and add and drop classes. Under the list of registered courses, students can view the name, ID, location, time, and professor for each of their enrolled courses. This information is pulled from the database. The student then has the option to drop the course. 

There are four validation checks when a student attempts to add a course. The student is given an error message and the course is not added if the student is already enrolled in the course, the course is full (zero seats remaining), there is a time conflict with another enrolled course, or the student is already enrolled in five courses. These validations are made using SQL Queries, PHP loops, and PDO Statements.

The list of available courses is generated dynamically (as most aspects of the website are), and shows the course ID, name, time, location, and professor. Hovering over the name of the course will display more specific information - a course description, required textbooks, and the number of seats remaining in the course. The number of seats remaining is calculated using a SQL Query to find the number of students enrolled and subtracting it from the course size. 

###### Login Page
The login page validates username and password using JavaScript. If an incorrect login is given, an error message is printed to the screen. Based on the type of login, the user is directed to either the admin, professor, or student page. Additionally, there is a logout button at the bottom of each page which redirects back to the login page.

## Discussion and Future Steps

###### Admin Page
In the future, I would like to add a course editing function to the admin page. This would likely lead to a restructuring of the layout of the admin page. Courses could be viewed in a list, added, edited, and deleted. Error checking that would be required includes checking that a duplicate class is not added and checking that the professor assigned is available for the course time.

The list display of students and professors is manageable with the current number of them but would be unrealistic if there were more students and professors. In order to fix this problem, I would change the list to a scrollable list and add a search bar where admin can search for students or professors by on name or ID. 

Add more statistics: Number of students in each major and average number of courses a student takes.

###### Professor Page
The professors changing their course time might lead to conflicts in the students' schedules. This is not accounted for in the current version of Athona. In order to fix this bug, a validation check could be added that doesn't allow the professor to change the time if any enrolled students have a time conflict. Another solution would be to unenroll any students with time conflicts and notify the student who is unenrolled. Using time constraints is another option - not allowing professors to change their course times during registration week. There are clearly a lot of options for fixing this issue.

###### Student Page
Finding a course might be difficult if more of them are added. Including a course search function would account for this possibility. Students could search either the course name or course ID to find the class faster. Similar to the admin page, making the course list into a scrollable list would be beneficial if more classes are added in the future. 

