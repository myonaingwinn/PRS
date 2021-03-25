<div class="container">
    <div class="card">
        <div class="card-content">
            <header>
            </header>
            <main>
                <div class="row">
                    <div class="left col s12">
                        <div class="photo-left">
                            <img class="photo" src="/img/profile_img/<?= $user['profile_img'] ? $user['profile_img'] : 'default.png' ?>" />
                        </div>
                        <h4 class="name"><?= $user['name'] ?></h4>
                        <p class="info"><?= $user['email'] ?></p>
                        <table>
                            <tr>
                                <th scope="row"><?= __('Gender') ?></th>
                                <td class="capitalize"><?= h($user->gender) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Birthdate') ?></th>
                                <td><?= h($user->birthdate->i18nFormat('YYY-MM-dd')) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Age') ?></th>
                                <td><?= $this->Number->format($user->age) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Phone') ?></th>
                                <td><?= h($user->phone) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('User Type') ?></th>
                                <td class="capitalize"><?= h($user->premium_flg) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<style>
    .container {
        margin-top: 1rem;
    }

    th {
        font-family: Raleway;
    }

    td {
        font-family: 'Open Sans';
    }

    table {
        margin-top: 1rem;
    }

    .capitalize {
        text-transform: capitalize;
    }

    header {
        background: #eee;
        background-image: url("/img/profile_img/background2.jpeg");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        background-color: teal;
        height: 250px;
    }

    header i {
        position: relative;
        cursor: pointer;
        right: -96%;
        top: 25px;
        font-size: 18px !important;
        color: #fff;
    }

    @media (max-width:800px) {
        header {
            height: 150px;
        }

        header i {
            right: -90%;
        }
    }

    main {
        padding: 20px 20px 0px 20px;
    }

    .left {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .photo {
        width: 200px;
        height: 200px;
        margin-top: -120px;
        border-radius: 100px;
        border: 4px solid #fff;
    }

    .name {
        margin-top: 20px;
        font-weight: 600;
        font-size: 18pt;
        color: #777;
    }

    .info {
        margin-top: -5px;
        margin-bottom: 5px;
        font-family: 'Open Sans', sans-serif;
        font-size: 11pt;
        color: #777;
    }
</style>