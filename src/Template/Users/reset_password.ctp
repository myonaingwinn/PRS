<div class="container">
    <div class="card">
        <form method="post">
            <div class="card-content">
                <span class="card-title">Reset Password</span>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" placeholder="New Password" type="password" class="validate" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 my-input">
                        <input id="confirmPassword" placeholder="Confirm Password" name="password" type="password" class="validate" required>
                    </div>
                </div>
                <div id="msg"></div>
            </div>
            <div class="card-action">
                <div class="row">
                    <button id="btnReset" type="submit" class="waves-effect waves-light btn indigo right">Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    .row {
        margin-bottom: 0px;
    }

    .card {
        margin-top: 5rem;
    }

    .my-input {
        margin-top: 0rem;
    }

    #msg {
        margin-left: .7rem;
    }
</style>

<script>
    $(function() {
        $("#confirmPassword, #password").keyup(function() {
            if ($("#password").val() != $("#confirmPassword").val() || $("#confirmPassword").val().trim().length == 0) {
                $("#msg").html("Password do not match").css("color", "red");
            } else {
                $("#msg").html("Password matched").css("color", "green");
            }
        });
    });

    $('#btnReset').click(function(event) {
        if ($("#password").val() != $("#confirmPassword").val() || $("#confirmPassword").val().trim().length == 0) {
            event.preventDefault();
        }
    });
</script>