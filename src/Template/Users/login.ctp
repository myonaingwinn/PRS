<div class="container">
    <div class="card">
        <div class="card-content">
            <div class="row">
                <form action="login" method="post">
                    <span class="card-title">Login</span>
                    <div class="input-field col s12">
                        <input placeholder="Your Email" name="email" type="email" class="validate" required>
                    </div>
                    <div class="input-field col s12 my-input">
                        <input placeholder="Your Password" name="password" type="password" class="validate" required>
                    </div>
            </div>
        </div>
        <div class="card-action">
            <div class="row">
                <div class="col s6">
                    <div class="row my-row1">
                        <a href="/forgotPassword">Forgot Password?</a>
                    </div>
                    <div class="row my-row2">
                        Don't you have an account?&nbsp;
                        <a href="/register">Register</a>
                    </div>
                </div>
                <div class="col s6">
                    <button type="submit" class="waves-effect waves-light btn indigo right">Login</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .card {
            margin-top: 5rem;
        }

        .input {
            margin: 1rem;
        }

        .row {
            margin-bottom: -.1rem;
        }

        .my-input {
            margin-top: 0rem;
        }

        .my-row1 {
            margin-top: -.2rem;
        }

        .my-row2 {
            margin-top: .1rem;
        }
    </style>