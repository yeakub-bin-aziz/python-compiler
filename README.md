# Python Code Compiler Web Application

## Overview
This project is a PHP web-based **Python code compiler** that allows users to write, execute, and interact with Python code directly through their web browser. It is designed for both beginners learning Python and advanced developers looking to test their code without setting up local environments.

## Key Features & Benefits

### Effortless Code Editing
- A custom-built Python editor with:
  - Syntax highlighting
  - Line numbering
  - Intuitive and responsive interface

### Instant Code Execution
- Write code and execute it instantly with the **"Run Code"** button.
- Get real-time feedback on output or errors.

### Upload and Download Code Files
- Upload `.py` files, modify them, and execute the code.
- Download updated scripts to your local machine.

### Customizable Editor
- Adjust font size to your preference for a tailored coding experience.

### Clear Output and Error Handling
- Errors and outputs are displayed in a clean, easy-to-read format for effective debugging.

## Technologies & Implementation

### Frontend
- **HTML**, **CSS**, **JavaScript**: A responsive, fast, and interactive interface.
- **CodeMirror**: Provides Python-specific syntax highlighting and line numbering.

### Backend
- Executes Python code securely in a **sandboxed environment**.
- Supports **Python 3** only, ensuring modern compatibility.

## Security Features

- **CSRF Protection**: Safeguards against cross-site request forgery.
- **Secure Code Execution**: Processes code in a controlled and sanitized environment.
- **File Upload Validation**: Accepts only `.py` files to prevent harmful uploads.
- **Temporary File Cleanup**: Deletes temporary files after execution, maintaining server hygiene.

## Limitations

- **Execution Environment**: Best suited for basic tasks; complex or resource-heavy operations may require optimization.
- **Python-Only Support**: Currently supports Python exclusively.
- **File Size Limit**: Uploaded files are limited to 128MB.

## Demo
- **Live Demo**: https://compiler.yeakub.xyz/python/

- ## Installation & Requirements

### Requirements
- **Python 3** installed on the server.

### Installation Steps
1. **Download or Clone the Project**
   - Clone the repository using Git:
     ```bash
     git clone https://github.com/yeakub-bin-aziz/python-compiler
     ```
   - Or download the ZIP file from GitHub and extract it.

2. **Upload to Server**
   - If working on a remote server, upload the extracted project files to the desired domain or subdomain directory on your server.

3. **Access the Project**
   - Navigate to the project directory on the server and ensure all required files are available.
   - Set up the project on your web server (e.g., Apache, Nginx) to serve the application.

4. **Start the Application**
   - Run the server or hosting service to make the application accessible.
   - Access the application via the browser at the server's public URL


## Project Status
- **Last Updated**: November 26, 2024
- **Status**: Archived  
  *(The project is no longer mantained!)*

## Conclusion
This web application provides a secure and user-friendly platform for Python development, offering robust features and seamless execution. While currently focused on Python, it has room for future enhancements and additional language support.
