<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
// Check if the user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Retrieve the username from the session
    $username = isset($_SESSION['uname']) ? $_SESSION['uname'] : 'Guest';
    $usertype = isset($_SESSION['type']) ? $_SESSION['type'] : 'Guest';
} else {
    // If not logged in, redirect to the login page
    header('Location: login.html');
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Alumni Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        main {
            padding: 20px;
            background-color: #fff;
            margin: 20px auto;
            width: 80%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        section {
            margin-bottom: 20px;
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 98%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background-color: #5cb85c;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #4cae4c;
        }

        .post {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
        }

        #searchBox {
            width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 0px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .profile {
            position: absolute;
            top: 10px;
            right: 103px;
            text-decoration: none;
            color: #fff;
            background-color: #007BFF;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .signup-link {
            position: absolute;
            top: 10px;
            right: 10px;
            text-decoration: none;
            color: #fff;
            background-color: #007BFF;
            padding: 10px 15px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            const postList = document.getElementById('post-list');

            function fetchPosts() {
                fetch('fetchpost.php')
                    .then(response => response.json())
                    .then(posts => {
                        postList.innerHTML = ''; // Clear the existing posts
                        posts.forEach(post => {
                            const postElement = document.createElement('div');
                            postElement.classList.add('post');
                            postElement.innerHTML = `
                                <h3>${post.author_firstname} ${post.author_lastname}(${post.post_usertype})</h3>
                                <h5>${post.title}</h5>
                                <p>${post.content}</p>
                                ${post.replies.length > 0 ?
                                `<div class="replies">
                                <main>
                                <section>
                                <h3>Replies:</h3>
                                ${post.replies.map(reply => `<p><strong>${reply.reply_fname} ${reply.reply_lname}(${reply.usertype}):</strong> ${reply.reply_content}</p>`).join('')}
                                </section>
                                </main>
                                </div>`
                                : '' }
                                <form class="reply-form">
                                    <label for="reply-${post.id}">Reply:</label>
                                    <textarea id="reply-${post.id}" name="reply" required></textarea>
                                    <button type="submit">Reply</button>
                                </form>
                            `;
                            postList.appendChild(postElement);
                        // Add event listener for reply form submission
                        const replyForm = postElement.querySelector('.reply-form');
                            
                            replyForm.addEventListener('submit', function(e) {
                                e.preventDefault();
                                const replyContent = replyForm.querySelector(`#reply-${post.id}`).value;
                                const postid = replyForm.querySelector(`#reply-${post.id}`).value;
                                //console.log(`post_id=${post.id}&replycontent=${encodeURIComponent(replyContent)}`);
                                fetch('create_reply.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/x-www-form-urlencoded',
                                    },
                                    body: `post_id=${post.id}&replycontent=${encodeURIComponent(replyContent)}`,
                                })
                                .then(response => response.text())
                                .then(() => {
                                    // After replying, fetch and display the updated posts
                                    fetchPosts();
                                    // Clear the reply form
                                    replyForm.reset();
                                })
                                .catch(error => console.error('Error creating reply:', error));
                            });
                        });
                    })
                    .catch(error => console.error('Error fetching posts:', error));
            }
            // Initial fetch of posts when the page loads
            fetchPosts();

            // Function to filter posts based on search query
            function searchFunction() {
                const input = document.getElementById('searchBox').value.toLowerCase();
                const posts = document.getElementsByClassName('post');

                for (let i = 0; i < posts.length; i++) {
                    const title = posts[i].querySelector('h5').innerText.toLowerCase();
                    const content = posts[i].querySelector('p').innerText.toLowerCase();
                    const author = posts[i].querySelector('h3').innerText.toLowerCase();

                    // Search within replies
                    const replies = posts[i].querySelectorAll('.replies p');
                    let foundInReplies = false;

                    replies.forEach(reply => {
                        if (reply.innerText.toLowerCase().includes(input)) {
                            foundInReplies = true;
                        }
                    });                                                                                                 
                    if (title.includes(input) || content.includes(input) || author.includes(input) || foundInReplies) {
                        posts[i].style.display = '';
                    } else {
                        posts[i].style.display = 'none';
                    }
                }
            }

            document.getElementById('searchBox').addEventListener('keyup', searchFunction);
        });
    </script>
    <header>
        <nav>
            <ul>
            <?php 
                if($usertype == 'alumni')
                {
                    echo '<li><a href="alumni_posting_page.php">Home</a></li>';
                    echo '<li><a href="alumnidirectory.php">Alumni Directory</a></li>';
                    echo '<li><a href="posts.php">Post</a></li>';
                    echo '<li><a href="alumniprofile.php">Profile</a></li>';
                    echo '<li><a href="signout.php">Sign Out</a></li>';
                }
                if($usertype == 'student')
                {
                    echo '<li><a href="student_posting_page.php">Home</a></li>';
                    echo '<li><a href="alumnidirectory.php">Alumni Directory</a></li>';
                    echo '<li><a href="posts.php">Post</a></li>';
                    echo '<li><a href="studentprofile.php">Profile</a></li>';
                    echo '<li><a href="signout.php">Sign Out</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Welcome <?php echo $username ?> to the Alumni Portal</h2>
            <p>Stay connected with your alma mater and fellow alumni.</p>
        </section>

        <section>
            <input type="text" id="searchBox" placeholder="Search for posts...">
            <h2>Recent Posts</h2>
            <div id="post-list"></div>
        </section>
    </main>

    <footer>
        <p>&copy; Alumni Portal</p>
    </footer>
</body>

</html>