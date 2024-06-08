## About FacultyMIS

This application is a management information system specifically built for CKT University of Technology and Applied Sciences in Ghana.

Live Demo: [facultymis](https://facultymis.azurewebsites.net/)

#### Technologies
- Laravel 10.x
- Vue3
- Inertia js
- Tailwind CSS 


#### Features
- It allows faculty data such as students, programmes and courses to be managed effectively
- It provides a help desk for any stakeholder needing information and support to contact
- It eliminates the need to circulate hardcopies between stakeholders by allowing all businesses of the faculty to be ran on the system 

### Getting Started
#### Requirements
The following dependencies is required to run FacultyMIS
- PHP
- MySQL
- Composer
- Nodejs

NB: XAMPP can be installed in place of PHP and MySQL

#### Setup
After installing the required dependencies, ran these commands.
> npm install

> composer update

> php artisan migrate --seed

> php artisan serve

The last command will serve the app on http://localhost:8000

Remember to edit your .env file to match your system settings

You can log into the admin dashboard with these credentials

Email: admin@cktutas.com
Password: password


### Usage
FacultyMIS is privilege-based and has these modules
- User - For managing users
- Requests - For sending documents/letters and communicating between faculty members
- Departments - Managing departments in the faculty
- Programmes - Managing programmes offered in the faculty
- Courses - Managing courses in the faculty
- Contact - Manage all messages sent through the Contact Us form
- Notices - Managing notices displayed on the notice board page

Any user using the system can have either one of these privileges

    |   User                    |   Privileges                                                                          |
    | ----------------          |   ----------------------------------------------------------------------              |
    |   Guest                   |   Manage Profile, requests                                                            |
    |   Student                 |   Manage Profile, requests, courses                                                   |
    |   Lecturer                |   Manage Profile, requests, courses,notices                                           |
    |   Head Of Department (Hod)|   Manage profile, requests, courses, notices, programmes                              |
    |   Administrator           |   Manage profile, requests, courses, programmes, departments, notices, users, contacts|
    |   SuperAdmin              |  Manage profile, requests, courses, programmes, departments, notices, users, contacts |
    
