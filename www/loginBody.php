<script>
    $("#emailFail").text("Enter another email!");
  $(document).ready(function () {
      $("#submit").bind("click", function () {
          $.ajax ({
        url: "checkLogIn.php",
        type: "POST",
        data: ({email: $("#email").val(), pass: $("#password").val()}),
        dataType: "html",
        beforeSend: function () {
            $("#submit").val("Checking...");
        },
        success: function (data) {
            $("#submit").val("Log in");
            if (data.indexOf("email") > -1) {
                $("#emailFail").html("");
                $("#emailFail").html(data);
                $("#passFail").html("");
            } else if (data.indexOf("password") > -1) {
                $("#emailFail").html("");
                $("#passFail").html("");
                $("#passFail").html(data);
            } else {
                window.location.replace("index.php");
            }
        }
      });
    });
  });
</script>
<div class="clear"><br/></div>
<div id="wrapper">
  <div id="articles">
    <div id="centerBlock">
      <h2 id="logInLabel">Log in</h2>
      <form action="" method="post">
        <label for="email">Email <span id="emailFail" style="color:#ff0000;"></span></label>
        <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $_SESSION["email"]; ?>"/>
        <label for="password">Password <span id="passFail" style="color:#ff0000;"></span></label>
        <input type="password" id="password" name="password" placeholder="Password" />
        <input type="button" id="submit" name="login" value="Log in"/>
      </form>
    </div>
  </div>
</div>
</div>
