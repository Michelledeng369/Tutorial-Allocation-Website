Author: Minxi Deng;
ID: 448185;

Database:
Username: dengm; 
password:448185

Access (the default access of all new user is 5):
DC: 1
UC: 2
Lecturer: 3
Tutor: 4
Student: 5

Tool: html, css(Bootstrap), jQuery, JavaScript, PHP.

The system is designed to plan Course Management System for the University of DoWell in Wonderland and has interaction with the database.

Database connection: db_conn.php
Session: session.php


Home Page: mainpage.php; signin_engine.php; signin_success.php; signout.php.

mainpage.php - basic layout of the website with navigation (navigation links are for students), footer (footer links for staffs).
signin_engine.php - to identity if the log in is success according to interact with database.
signin_success.php - similar with mainpage, include session.
signout.php - log out function.


Registration page: Registration.php - students and staffs can sign up in this page.


Master List Page - academic staff: MasterPageforAcademicStaff.php; staff_edit.php.

MasterPageforAcademicStaff.php - only available for DC (access: 1). Here DC can allocate title (Lecturer, Tutor) for staffs by clicking "edit" button and type "Lecturer" or/and "Tutor" on the input box. Delete and edit content is available, as well as add new staff (support codes for "add" are in this file).
staff_edit.php - support for "edit" and "delete" function.


Master List Page - Unit: MasterPageforUnit.php; unit_filter.php; unit_edit.js.

MasterPageforUnit.php - only available for DC (access: 1). Here DC can add, delete, edit unit content.
unit_filter.php -  support for "search" function.
unit_edit.js - support for "edit" and "delete" function.


Unit Detail Page – Unit Description Page: UnitDetail.php; search_query.php.

UnitDetail.php - everyone can see this page.  
search_query.php - support for "search" function.


Unit Enrollment Page: UnitEnrolment.php; insert_enroll.php; manage_enroll.php; enroll_delete.php.

UnitEnrolment.php -  only available for student (access: 5). The unit details which are added by DC will be shown here. The same unit cannot be enrolled again.
insert_enroll.php - support "enroll" function.
manage_enroll.php - student can delete the current enrollment here. 
enroll_delete.php - support "delete" function.


Individual Timetable page: Timetable.php - only available for student (access: 5). Here the lecture and tutorial time and location will be shown according to the id of login student.


User Account Page: useraccount_staff.php; useraccount_student.php; student_account.php; staff_account.php; MyAccount.php.

useraccount_staff.php - available for staff (access: 1,2,3,4). The details of login user will be shown on the input box where user can change them, the timetable will show the lecture and tutorial details if DC allocate course for the login user.
useraccount_student.php - only available for student (access: 5). The details of login user will be shown on the input box where user can change them, the timetable will show the lecture and tutorial details of the login user enrolled. 
student_account.php - support for data update of useraccount_student.php.
staff_account.php - support for data update of useraccount_staff.php.
MyAccount.php - support for "My Account" link, if the access is 5 (student), it will go to useraccount_student.php; if the access is not 5 (student), it will go to useraccount_staff.php.


Unit Management / allocating teaching staff: Unit_management.php; unit_edit.php; tutorial.php; filter.php; edit.js

Unit_management.php -  available for DC (access: 1) and UC (access: 2). UC can allocate lecture for available staff (shown on the "Available Lecturer") and edit the lecture time, location and consultation for each unit.
unit_edit.php - support "edit" in Unit_management.php.
tutorial.php - UC can allocate tutorial for available staff (shown on the "Available Tutor") and edit the tutorial time, location and max capacity for each unit.
filter.php - support "search" function.
edit.js - support tutorial "edit".


Tutorial Allocation Page: TutorialAllocation.php; tutorial_enroll.php; manage_tutorial.php; tut_enroll_delete.php. 

TutorialAllocation.php -  only available for student (access: 5). Here user can enroll the tutorial according to the enrolled units. The same tutorial cannot be enrolled again.
tutorial_enroll.php - support for "enroll" button.
manage_tutorial.php - student can delete the current enrollment here.
tut_enroll_delete.php - support "delete" function.


Enrolled Student Details Page: EnrolledStudent.php; EnrolledStudent_dc.php; EnrolledStudent_uclec.php; EnrolledStudent_tutor.php.

EnrolledStudent.php -  support for "Enrolled Student" link, if the access is 1 (DC), it will go to EnrolledStudent_dc.php; if the access is 2 (UC) and 3 (Lecture), it will go to EnrolledStudent_uclec.php, if the access is 1 (DC), it will go to EnrolledStudent_tutor.php.