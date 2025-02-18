<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submissions</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Submit Data</h1>
    <form id="submissionForm">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Submit">
    </form>

    <h2>Submissions</h2>
    <div id="submissionsList">
        <!-- Submissions will be loaded here -->
    </div>

    <script>
        $(document).ready(function() {
            // Load submissions when the page loads
            loadSubmissions();

            // Handle form submission
            $('#submissionForm').on('submit', function(event) {
                event.preventDefault(); // Prevent the form from submitting normally

                // Send form data via AJAX
                $.ajax({
                    url: 'submit.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert('Submission successful!');
                        loadSubmissions(); // Reload submissions after successful submission
                        $('#submissionForm')[0].reset(); // Clear the form
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred: ' + error);
                    }
                });
            });
        });

        // Function to load submissions
        function loadSubmissions() {
            $.ajax({
                url: 'get_submissions.php',
                type: 'GET',
                success: function(response) {
                    $('#submissionsList').html(response); // Update the submissions list
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while loading submissions: ' + error);
                }
            });
        }
    </script>
</body>
</html>
