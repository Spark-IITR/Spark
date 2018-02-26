

        <form role="form" action="mail.php" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" type="text" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input name="subject" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="msg" rows="5" class="form-control input-lg"></textarea>
            </div>
            <center><button class="btn btn-info" type="submit">Submit</button></center>
        </form>