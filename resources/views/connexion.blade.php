@include('head')

<div>
    <h1>Connexion</h1>

    <div>
        <form action="/seConnecter" method="post">
        
            <fieldset>
                <legend>Vos informations</legend>

                <div>
                    <label for="email">email :</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div>
                    <label for="mdp">mdp :</label>
                    <input type="password" id="mdp" name="mdp" required>
                </div>

                <button type="submit">Envoyer</button>
            </fieldset>
        </form>
 
    </div>
</div>

@include('footer')


