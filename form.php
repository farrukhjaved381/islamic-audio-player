<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <style>
        /* Basic styling for the form */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .contact-form {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .contact-form h2 {
            margin-bottom: 15px;
            font-size: 20px;
            text-align: center;
        }
        .contact-form input, 
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .contact-form button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            border: none;
            color: #fff;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        .contact-form button:hover {
            background-color: #4cae4c;
        }
        .response {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="contact-form">
        <h2>Contact Us</h2>
        <form id="contactForm" method="POST">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="text" name="subject" placeholder="Subject" required>
            <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
            <button type="submit">Send Message</button>
        </form>
        <div class="response"></div>
    </div>

    <script>
        // Handle form submission with AJAX
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            var form = e.target;
            var formData = new FormData(form);

            fetch('contact.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                var responseDiv = document.querySelector('.response');
                if (data.success) {
                    responseDiv.innerHTML = '<p style="color:green;">' + data.message + '</p>';
                    form.reset();
                } else {
                    responseDiv.innerHTML = '<p style="color:red;">' + data.message + '</p>';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>
