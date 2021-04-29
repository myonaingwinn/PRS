<?= $this->Form->create($admin) ?>
<div class="container">
    <div class="card">
        <div class="card-content">
            <span class="card-title">Register</span>
            <div class="row">
                <div class="input-field col s12 my-input">
                    <input placeholder="Email" name="email" type="email" class="validate" required>
                </div>
                <div class="input-field col s12 my-input">
                    <input placeholder="Password" name="password" type="password" class="validate" required>
                </div>
            </div>
        </div>
        <div class="card-action">
            <div class="ca-row">
                <button type="submit" class="waves-effect waves-light btn indigo right">Register</button>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>


<style>
    .card {
        margin-top: 5rem;
    }

    .input {
        margin: 1rem;
    }

    .row {
        margin-top: 1rem;
        margin-bottom: -.1rem;
    }

    .ca-row {
        padding-bottom: 2.5rem;
    }
</style>