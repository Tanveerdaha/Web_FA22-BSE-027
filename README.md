# Course Management System

This project is a **Course Management System** built with **Laravel**. The system allows the admin to log in, add new courses, and view the courses available. It provides a simple interface to manage courses with basic functionalities.

## Features
- **Admin Login**: Login as an admin using predefined credentials (`admin` / `admin`).
- **Add Course**: Admin can add courses with information such as title, instructor, credit hours, and semester.
- **View Courses**: Admin can view all courses in the system.
- **Search Courses**: Search courses based on their title or instructor.

## Installation

1. **Clone the Repository**
    ```bash
    git clone https://github.com/your-username/course-management-system.git
    ```

2. **Install Dependencies**
    Navigate to the project directory and install the necessary PHP and Laravel dependencies:
    ```bash
    cd course-management-system
    composer install
    ```

3. **Set Up Environment**
    Copy the `.env.example` file to `.env`:
    ```bash
    cp .env.example .env
    ```

4. **Generate Application Key**
    Run the following command to generate the application key:
    ```bash
    php artisan key:generate
    ```

5. **Database Setup**
    Configure your database in the `.env` file, then run migrations:
    ```bash
    php artisan migrate
    ```

6. **Run the Application**
    Start the Laravel development server:
    ```bash
    php artisan serve
    ```
    You can now access the application at `http://localhost:8000`.

## Usage

1. **Login as Admin**:
    - On loading the application, you will be prompted with a login screen.
    - Enter **username**: `admin` and **password**: `admin` to proceed.

2. **Add a Course**:
    - After logging in, the admin can add a new course by filling out the course title, instructor, credit hours, and semester.
    - The form will be displayed once logged in.

3. **View and Search Courses**:
    - Once logged in, the admin can view all courses and search for courses by title or instructor.

## Screenshots

- **Login Screen**:
  ![Login Screen](https://github.com/user-attachments/assets/b93292a7-1651-49bd-afca-d124d54d355e)

- **Add Course Form**:
  ![Add Course](https://github.com/user-attachments/assets/3d2c5efc-6d71-4220-8c70-af0df2fa53ee)

- **Search Courses**:
  ![Search Courses](https://github.com/user-attachments/assets/6bfbe7cd-1a6a-4df4-ba82-a3ad70d3e953)

- **Course List**:
  ![Course List](https://github.com/user-attachments/assets/5b0f3d9a-6846-4ad2-86a4-9d184909e592)
  
## Contributing

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-name`).
3. Commit your changes (`git commit -am 'Add feature'`).
4. Push to the branch (`git push origin feature-name`).
5. Create a new pull request.

## License
This project is open-source and available under the [MIT License](LICENSE).
