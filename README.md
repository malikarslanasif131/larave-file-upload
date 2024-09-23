<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About This Laravel Project

This is a **Laravel-based file upload and gallery management system**. The application allows users to upload image files with metadata (author name, title, and category), and then manage these files through CRUD operations (Create, Read, Update, Delete). It also includes validation for file uploads and image file types, ensuring users can only upload supported formats like `.jpg`, `.png`, and `.jpeg`.

This project is built on Laravel's MVC architecture, using **Eloquent ORM** for database interactions and **Bootstrap** for front-end styling.

### Features

-   **File Upload:** Users can upload image files with additional metadata (author name, title, category).
-   **Image Validation:** Ensures that only valid image formats are uploaded (`jpg`, `png`, `jpeg`) and checks for file size limits.
-   **CRUD Operations:**
    -   Create new gallery records with file uploads.
    -   Read and display gallery items in a grid layout with images and metadata.
    -   Update existing gallery items and replace files.
    -   Delete gallery records and their associated files from the server.
-   **File Management:** Automatically handles file storage in the `public/storage/uploads` folder, and deletes files from the server when a record is deleted.
-   **Frontend:** Uses Bootstrap to create a responsive and clean UI with validation feedback.

### Installation Instructions

To get this project up and running on your local machine, follow these steps:

1. **Clone the Repository**:

    ```bash
    git clone https://github.com/your-repository.git
    cd your-repository
    ```

2. **Install Dependencies**:
   Install PHP dependencies using Composer:

    ```bash
    composer install
    ```

3. **Environment Setup**:
   Copy the `.env.example` file to create a new `.env` file:

    ```bash
    cp .env.example .env
    ```

    Generate a new application key:

    ```bash
    php artisan key:generate
    ```

    Configure your database settings in the `.env` file:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

4. **Migrate the Database**:
   Run the migration to create the necessary database tables:

    ```bash
    php artisan migrate
    ```

5. **Storage Link**:
   Link the storage folder to public for file uploads:

    ```bash
    php artisan storage:link
    ```

6. **Run the Application**:
   Start the Laravel development server:

    ```bash
    php artisan serve
    ```

7. **Access the Application**:
   Open your browser and navigate to `http://localhost:8000` to see the application in action.

### Usage Instructions

-   **Upload an Image**: Fill in the author name, title, category, and select an image file. Click "Upload" to save the record.
-   **View the Gallery**: View all uploaded images, along with their metadata, displayed in a responsive grid format.
-   **Edit an Entry**: Click the "Edit" button under any image to modify its metadata or replace the image.
-   **Delete an Entry**: Click "Delete" to remove the image and its record from the system. This also deletes the image from the server.

### Validation

-   **File Validation**: The application restricts file uploads to the following formats: `.jpg`, `.png`, and `.jpeg`. Files are also limited in size (maximum 2MB).
-   **Form Validation**: The form fields for `author_name`, `title`, and `category` are required and validated on submission.

### Technologies Used

-   **Laravel Framework**: Backend development and routing.
-   **Eloquent ORM**: Database management and model handling.
-   **Blade Templating Engine**: For dynamic content rendering and layout structure.
-   **Bootstrap 5**: Frontend styling and responsive design.
-   **JavaScript (Bootstrap JS)**: Handling dynamic behaviors such as closing alerts.

### Contributing

Feel free to fork this repository and submit pull requests. If you encounter any issues, please open an issue on GitHub, and we will do our best to resolve it.

### License

This project is open-source and licensed under the [MIT license](https://opensource.org/licenses/MIT).
