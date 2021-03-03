<!-- <?php
        /**
         * @var \App\View\AppView $this
         */
        ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Answers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Surveys'), ['controller' => 'Surveys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Survey'), ['controller' => 'Surveys', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Options'), ['controller' => 'Options', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Option'), ['controller' => 'Options', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="answers form large-9 medium-8 columns content">
    <?= $this->Form->create($answer) ?>
    <fieldset>
        <legend><?= __('Add Answer') ?></legend>
        <?php
        echo $this->Form->control('product_id', ['options' => $products, 'empty' => true]);
        echo $this->Form->control('category_id', ['options' => $categories]);
        echo $this->Form->control('question_id', ['options' => $questions]);
        echo $this->Form->control('survey_id', ['options' => $surveys]);
        echo $this->Form->control('option_id', ['options' => $options, 'empty' => true]);
        echo $this->Form->control('user_id', ['options' => $users]);
        echo $this->Form->control('answer');
        echo $this->Form->control('remark');
        echo $this->Form->control('rating');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div> -->

<style type="text/css">
    .card .card-content {
        padding: 1.5rem;
    }

    .col .row {
        margin-left: 0rem;
        margin-right: 0rem;
        margin-bottom: 0rem;
    }

    .my-submit,
    .container {
        margin-top: 2rem;
    }

    .row .col.s5 {
        width: 26.6666666667%;
        margin-right: 6%;
        left: auto;
        right: 0px;
    }

    .btn-large {
        width: max-content;
    }

    .my-input-field {
        margin-top: 0.5rem;
        margin-bottom: -2rem;
    }

    .my-icon {
        color: grey;
    }

    .my-card-action {
        margin-top: 1.5rem;
    }

    p {
        padding-bottom: 1rem;
    }

    h4 {
        margin: 1rem 0 .912rem 0;
    }

    h6 {
        margin-top: -0.5rem;
    }
</style>

<form method="post" action="/answers/add">
    <!-- Title Card -->
    <div class="container" id="title-card">
        <div class="col s3">
            <div class="card hoverable">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">
                            <!-- <input id="txtTitle" name="name" placeholder="Survey Title" type="text" class="validate" require> -->
                            <!-- <input id="txtDescription" name="description" placeholder="Survey Description" type="text" class="validate">
                             -->
                            <h4><?= h($survey[0]->title) ?></h4>
                            <p><?= h($survey[0]->description) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <?php foreach ($questions as $question) : ?>
        <input type="hidden" value="<?= h($question->id) ?>">
        <script>
            var tmp = '<?php echo $question->type ?>';
            var description = '<?= h($question->description) ?>';
            var type = getType(tmp);

            console.log(type);
            createCard(1);
        </script>
    <?php endforeach ?> -->

    <!-- Check Card -->
    <!-- <div class="container" id="card-2">
        <div class="col s3">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="input-field col s12">
                            <h6 id="txt-text-Question-' + cardCount + '">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum beatae inventore ducimus cupiditate ex nam recusandae reprehenderit odio ea totam molestiae quisquam excepturi rerum amet officiis tempora aut, optio, consequuntur expedita minus. Pariatur blanditiis dolorem inventore! Quas perspiciatis libero suscipit ut? Natus veniam dolor culpa itaque ipsum tempore ducimus iste.</h6>
                        </div>
                    </div>
                    <div id="card-1-child-1" class="row check-child">
                        <div class="input-field col s6">
                            <p>
                                <label>
                                    <input type="checkbox" />
                                    <span>Filled in Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum, quam!</span>
                                </label>
                            </p>
                            <p>
                                <label>
                                    <input type="checkbox" />
                                    <span>Filled in</span>
                                </label>
                            </p>
                        </div>
                        <div class="input-field col s6">
                            <p>
                                <label>
                                    <input type="checkbox" />
                                    <span>Filled in / out Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa,</span>
                                </label>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

</form>

<script>
    var cardCount = 0;
    // load data from DB
    var survey = <?php echo json_encode($survey); ?>;
    var questions = <?php echo json_encode($questions); ?>;
    var options = <?php echo json_encode($options); ?>;
    console.log(survey);
    console.log(questions);
    console.log(options);

    questions.forEach(element => {
        // console.log(element.id);
        // var type = getType(element.type);
        // console.log(type);
        createCard(element.type, element.description);
        // console.log('card no : ' + cardCount);
        options.forEach(elem => {
            if (element.id === elem.question_id) {
                // console.log('option: ' + elem.description);
                addOption(element.type, elem.description, cardCount);
            }
        });
    });

    // return Question Type
    function getType(args) {
        var type = '';
        switch (args) {
            case 'text':
                type = 1;
                break;
            case 'check':
                type = 2;
                break;
            case 'radio':
                type = 3;
                break;
        }
        return type;
    }

    // Create Card
    function createCard(type, description) {
        // get last card
        var lastCardID = $(".container:last").attr('id');
        var cardTotal = $(".container").length - 2; //default container and title container

        // if (cardTotal < 30) {
        $('#card_total').val(cardTotal + 1);

        if (cardTotal > cardCount) {
            cardCount = cardTotal;
            cardCount++;
        } else {
            cardCount++;
        }

        var ID = 'card-' + cardCount;
        var container = $('<div class="container" id="' + ID + '"></div>');
        container.insertAfter($("#" + lastCardID));
        var card = "";

        if (type === 'text') {
            // card = $('<div class="col s3"><div class="card hoverable"><div class="card-content"><div class="row"><div class="input-field col s12"><input  id="txt-text-Question-' + cardCount + '"  placeholder="Question" type="text" class="validate" required value="' + description + '" disabled></div></div><div class="row"><div class="input-field col s12"><input placeholder="Your answer" type="text" class="validate"></div></div></div><div class="card-action"><div class="row"><div class="col s10"></div><div class="col s2"><div id="delete-' + cardCount + '" class="waves-effect waves-light my-btn"><i class="material-icons">delete</i></div></div></div></div></div></div></div>');
            card = $('<div class="col s3"><div class="card hoverable"><div class="card-content"><div class="row"><div class="input-field col s12"><h6  id="txt-text-Question-' + cardCount + '" >' + description + '</h6></div></div><div class="row"><div class="input-field col s12"><input placeholder="Your answer" type="text" class="validate"></div></div></div></div></div></div>');
        } else if (type === 'check') {
            // card = $('<div class="col s3"><div class="card hoverable"><div class="card-content"><div class="row"><div class="input-field col s12"><input id="txt-check-Question-' + cardCount + '"  placeholder="Question" type="text" class="validate" require></div></div><div id="crd-' + cardCount + '-check-child-1" class="row check-child"> <div class="input-field col s8 my-input-field"> <i class = "material-icons prefix my-icon" > check_box_outline_blank </i> <input placeholder = "Option" type = "text"> </div> <div class = "input-field col s1" > <a class = "btn-floating waves-effect btn-small green lighten-1" onclick="addOption(this)"> <i class = "material-icons"> add </i> </a> </div> </div> </div> <div class="card-action my-card-action"> <div class="row"> <div class="col s10"> </div> <div class = "col s2" >  <div id = "delete-' + cardCount + '" class = "waves-effect waves-light my-btn" > <i class = "material-icons">delete</i> </div> </div> </div > </div> </div> </div> </div > ');
            card = $('<div class="col s3"><div class="card hoverable"><div class="card-content"><div class="row"><div class="input-field col s12"><h6 id="txt-check-Question-' + cardCount + '">' + description + '</h6></div></div><div id="crd-' + cardCount + '-check-child-1" class="row check-child"> <div id="crd-' + cardCount + '-check-child-2" class="input-field col s6"></div></div></div></div></div></div> ');
            // <p><label><input type="checkbox" /><span>Filled in Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum, quam!</span></label></p>
        } else if (type === 'radio') {
            // card = $('<div class="col s3"><div class="card hoverable"><div class="card-content"><div class="row"><div class="input-field col s12"><input id="txt-radio-Question-' + cardCount + '"  placeholder="Question" type="text" class="validate" require></div></div><div id="crd-' + cardCount + '-radio-child-1" class="row radio-child"> <div class="input-field col s8 my-input-field"> <i class = "material-icons prefix my-icon" > radio_button_unchecked</i> <input placeholder = "Option" type = "text"> </div> <div class = "input-field col s1" > <a class = "btn-floating waves-effect btn-small green lighten-1" onclick="addOption(this)"> <i class = "material-icons"> add </i> </a> </div> </div> </div> <div class="card-action my-card-action"> <div class="row"> <div class="col s10"> </div> <div class = "col s2" >  <div id = "delete-' + cardCount + '" class = "waves-effect waves-light my-btn" > <i class = "material-icons">delete</i> </div> </div> </div > </div> </div> </div> </div > ');
            card = $('<div class="col s3"><div class="card hoverable"><div class="card-content"><div class="row"><div class="input-field col s12"><h6 id="txt-radio-Question-' + cardCount + '">' + description + '</h6></div></div><div id="crd-' + cardCount + '-radio-child-1" class="row radio-child"> <div id="crd-' + cardCount + '-radio-child-2" class="input-field col s8"></div></div></div></div></div></div>');
            // <p><label><input class="with-gap" name="group3" type="radio"/><span>Filled in Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum, quam!</span></label></p>
        }

        container.append(card);
        // } else {
        //     M.toast({
        //         html: 'Only 30 Questions\'re allowed.'
        //     });
        // }
    }

    // add Check/Radio Option
    function addOption(optionType, description, cardNo) {
        // var id = $(btnAdd).parent().parent().attr('id');
        // console.log("parent id : " + id);

        // if (getChildCount(id) < 9) {
        // var raw = id.split('-');

        // var cardNo = raw[1];
        // var optionType = raw[2];
        var parentID = 'crd-' + cardNo + '-' + optionType + '-child-2';

        var option = '';

        if (optionType == 'check') {
            /* option = '<div id="crd-' + cardNo + '-check-child-1" class="row check-child"><div class="input-field col s8 my-input-field"><i class="material-icons prefix my-icon">check_box_outline_blank</i><input placeholder="Option" type="text"></div><div class="input-field col s1"><a class="btn-floating waves-effect btn-small red lighten-1 remove"><i class="material-icons">remove</i></a></div></div>'; */
            option = '<p><label><input type="checkbox" /><span>' + description + '</span></label></p>';
        } else if (optionType == 'radio') {
            /* option = '<div id="crd-' + cardNo + '-radio-child-1" class="row radio-child"><div class="input-field col s8 my-input-field"><i class="material-icons prefix my-icon">radio_button_unchecked</i><input placeholder="Option" type="text"></div><div class="input-field col s1"><a class="btn-floating waves-effect btn-small red lighten-1 remove"><i class="material-icons">remove</i></a></div></div>'; */
            option = '<p><label><input class="with-gap" name="group3" type="radio"/><span>' + description + '</span></label></p>';
            // FIXME:GROUP NAME
        }

        if (option != '') {
            $('#' + parentID).append(option);

            // setNewID(id);
        }
        // $('#' + id + ' :last-child').focus();
        // }
    }
</script>