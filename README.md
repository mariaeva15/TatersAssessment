# Taters Assessment

## Introduction

This web program is developed to fulfill the requirements outlined below. It provides user registration, confirmation email, password setup, and user sign-in functionalities. Additionally, it allows users to query reports based on different criteria such as Barangay, Municipality, Age, and Gender.

## Setup

1. **Sign-up/Register:**
   - Username: Alphanumeric
   - Password: Alphanumeric
   - Name:
     - Lastname: Alphanumeric
     - Firstname: Alphanumeric
   - Address:
     - House, Street, Village: Alphanumeric
     - Barangay: Database selection
     - Municipality: Database selection
     - Mobile Number: Numeric
     - Age: Numeric
     - Gender: Database selection (M, F)
   - Email Address: Alphanumeric
   - Sign-up page Address is database-driven for Metro Manila.

2. **Confirmation Email:**
   - Sends a confirmation email to the user triggering the setup of the password.

3. **Sign-in:**
   - Upon sign-in:
     - Displays "Hello 'Username', welcome to my Test Page."
     - Enables query of reports with filters:
       - All Data (excludes password)
       - Users by Barangay (filtered based on the database)
       - Users by Municipality (filtered based on the database)
       - Users by Age (numeric input for query)
       - Users by Gender (filtered based on the database)
     - Reports display the following information:
       - Username
       - Name (Lastname, Firstname)
       - Barangay
       - Municipality
       - Mobile Number
       - Age
       - Gender

## Additional Information

1. Developed using PHP. CSS and JavaScript are used for enhanced styling and interactivity.
   - Usage of CodeIgniter with an MVC framework

2. PHPMyAdmin and CPanel environment for deployment is not required but would be a plus.

## Authors

Maria Evangelicalyn Ong

## License

This project is licensed under the MIT License. See the LICENSE.md file for details.
