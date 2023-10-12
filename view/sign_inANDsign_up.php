<body>
    
    <section class="boddd">
        <div class="Form_container right-panel-active">
            <!-- Sign Up -->
            <div class="container__form container--signup">
                <form action="" method="post" class="form" id="form1">
                    <h2 class="form__title">Sign Up</h2>
                    <input id="User-id"type="text" placeholder="User Name" class="input Sign-UP-INPUT" name="user_name" required/>
                    <input id="Email-id"type="email" placeholder="User Mail" class="input Sign-UP-INPUT" name="user_mail" required/>
                    <input id="mobile-id" type="text" placeholder="User mobile" pattern="[6789][0-9]{9}" class="input Sign-UP-INPUT" name="user_mobile" required/>
                    <input id="Profile-id"type="text" placeholder="Profile Name" class="input Sign-UP-INPUT" name="user_profile_name" required/>
                    <input id="Password-id"type="password" placeholder="Password" class="input Sign-UP-INPUT" name="user_password" required/>
                    <button class="btn" name="Sign_Up">Sign Up</button>
                </form>
            </div>
            
            <!-- Sign In -->
            <div class="container__form container--signin">
                <form action="" method="post" class="form" id="form2">
                    <h2 class="form__title">Sign In</h2>
                    <input id="sign-in-email"type="email" placeholder="Email" class="input Sign-IN-INPUT" name="Chack_User_Mail" required/>
                    <input id="sign-in-password"type="password" placeholder="Password" class="input Sign-IN-INPUT" name="Chack_user_password" required/>
                    <a href="#" class="link">Forgot your password?</a>
                    <button class="btn" name="Sign_In">Sign In</button>
                </form>
            </div>
            
            <!-- Overlay -->
            <div class="container__overlay">
                <div class="overlay">
                    <div class="overlay__panel overlay--left">
                        <button class="btn" id="signIn" onclick="Show_Sign_In()">Sign In</button>
                    </div>
                    <div class="overlay__panel overlay--right">
                        <button class="btn" id="signUp" onclick="Show_Sign_Up()">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>