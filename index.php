<?php
session_start(); // Start the session for CSRF protection

// Generate a CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Python Compiler</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.0/codemirror.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.0/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.0/mode/python/python.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Web Based Python Compiler <br>Developed by Yeakub.<br></h2>
        <form id="codeForm" class="code-form" method="POST" action="compile.php">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
            <div class="form-group">
                <div id="codeEditor" style="height: 300px;"></div>
                <textarea name="code" id="code" style="display: none;"></textarea>
            </div>
            <button type="submit" class="btn btn-success btn-block run-button">Run Code</button>
            <button type="button" id="uploadButton" class="btn btn-info btn-block mt-2">Upload Code</button>
            <button type="button" id="downloadButton" class="btn btn-warning btn-block mt-2">Download Code</button>
            <div class="mt-3">
                <button type="button" id="increaseFont" class="btn btn-light">A+</button>
                <button type="button" id="decreaseFont" class="btn btn-light">A-</button>
            </div>
            <input type="file" id="fileUpload" accept=".py" style="display: none;">
        </form>
        <h2 class="mt-4">Output:</h2>
        <pre id="output" class="output"></pre>
    </div>

    <footer class="text-center mt-4">
        <p>Copyright © 2025 Md Yeakub Bin Aziz</p>
        <p>
            Relevant Links:
            <a href="https://www.yeakub.xyz/" target="_blank">Portfolio</a> |
            <a href="https://projects.yeakub.xyz/project/python-code-compiler-web-application" target="_blank">Project Case Study</a> |
            <a href="https://projects.yeakub.xyz/" target="_blank">Check Out My Other Projects</a> |
            <a href="https://www.facebook.com/mdyeakubaziz/" target="_blank">Facebook</a> |
            <a href="https://www.linkedin.com/in/yeakubbinaziz/" target="_blank">LinkedIn</a>
        </p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize CodeMirror
            var editor = CodeMirror(document.getElementById("codeEditor"), {
                lineNumbers: true,
                mode: "python",
                theme: "default",
                viewportMargin: Infinity
            });

            // Handle form submission
            $('#codeForm').on('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                // Set the value of the hidden textarea to the editor content
                $('#code').val(editor.getValue());

                $.ajax({
                    url: 'compile.php',
                    type: 'POST',
                    data: $(this).serialize(), // Serialize the form data
                    success: function(response) {
                        $('#output').text(response); // Display the output in the output box
                    },
                    error: function() {
                        $('#output').text('An error occurred while processing your request.'); // Handle errors
                    }
                });
            });

            // Handle File Upload
            $('#uploadButton').on('click', function() {
                $('#fileUpload').click(); // Trigger file input click
            });

            $('#fileUpload').on('change', function() {
                var fileInput = this;
                if (fileInput.files.length > 0) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        editor.setValue(e.target.result); // Populate the editor with file content
                    };
                    reader.readAsText(fileInput.files[0]);
                }
            });

            // Handle File Download
            $('#downloadButton').on('click', function() {
                var code = editor.getValue();
                var blob = new Blob([code], { type: 'text/plain' });
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = 'code.py'; // Default filename
                link.click();
            });

            // Font Size Adjustment
            var fontSize = 14; // Default font size
            $('#increaseFont').on('click', function() {
                fontSize += 2;
                editor.getWrapperElement().style.fontSize = fontSize + 'px';
            });

            $('#decreaseFont').on('click', function() {
                if (fontSize > 8) {
                    fontSize -= 2;
                    editor.getWrapperElement().style.fontSize = fontSize + 'px';
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
