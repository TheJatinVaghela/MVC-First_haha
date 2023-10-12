<body>
    
    <section class="boddd">
        <div class="Form_container right-panel-active">
            <!-- Sign Up -->
            <div class="container__form container--signup">
                <form action="#" class="form" id="form1">
                    <h2 class="form__title">Sign Up</h2>
                    <input id="User-id"type="text" placeholder="User" class="input" />
                    <input id="Email-id"type="email" placeholder="Email" class="input" />
                    <input id="Password-id"type="password" placeholder="Password" class="input" />
                    <button class="btn">Sign Up</button>
                </form>
            </div>
            
            <!-- Sign In -->
            <div class="container__form container--signin">
                <form action="#" class="form" id="form2">
                    <h2 class="form__title">Sign In</h2>
                    <input type="email" placeholder="Email" class="input" />
                    <input type="password" placeholder="Password" class="input" />
                    <a href="#" class="link">Forgot your password?</a>
                    <button class="btn">Sign In</button>
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