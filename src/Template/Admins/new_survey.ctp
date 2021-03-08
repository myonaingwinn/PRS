<style type="text/css">
    .card .card-content {
        padding: 10px;
        border-radius: 50px;
    }

    .col .row {
        margin-left: 0rem;
        margin-right: 0rem;
        margin-bottom: 0rem;
    }

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
</style>

<!--
    TODO: Draggleable Card
-->


<!-- TODO: handle Category and Products -->
<div class="row">
    <div class="input-field col s1"></div>
    <div class="input-field col s2">
        <h6>Choose target &emsp;:</h6>
    </div>
    <div class="input-field col s4">
        <select id="selCategory">
            <option value="0" disabled selected>Choose your category</option>
            <?php foreach ($categories as $category) : ?>
                <option value="<?= h($category->id) ?>"><?= h($category->category_name) ?></option>
            <?php endforeach ?>
        </select>
        <label>Select Category</label>
    </div>

    <div class="input-field col s4">
        <select id="selProduct" class="selProduct">
            <option value="0" disabled selected>Choose your product</option>
            <!-- <option value="1">Option 1</option> -->
            <?php foreach ($products as $product) : ?>
                <option value="<?= h($product->id) ?>" data-category="<?= h($product->category_id) ?>"><?= h($product->product_name) ?></option>
            <?php endforeach; ?>
        </select>
        <label>Select Product</label>
    </div>
</div>

<!-- Title Card -->
<div class="container" id="card-title">
    <div class="col s3">
        <div class="card hoverable">
            <div class="card-content">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="txtTitle" placeholder="Form Title" type="text" class="validate" require>
                        <input id="txtDescription" placeholder="Form Description" type="text" class="validate">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FAB -->
<div class="fixed-action-btn">
    <a class="btn-floating btn-large red">
        <i class="large material-icons">add</i>
    </a>
    <ul>
        <li onclick="createCard(1)"><a class="btn-floating yellow darken-1"><i class="material-icons">title</i></a></li>
        <li onclick="createCard(2)"><a class="btn-floating green"><i class="material-icons">check_box</i></a></li>
        <li onclick="createCard(3)"><a class="btn-floating blue"><i class="material-icons">radio_button_checked</i></a></li>
    </ul>
</div>

<!-- TOAST -->
<!-- <a id="add" class="btn">
    <i class="material-icons left">ac_unit</i>Toast!</a> -->

<script>
    var cardCount = 0;

    $(function() {

        // function for TOAST
        /* $("#add").click(function() {
            var last_id = $(".container:last").attr('id');
            var total = $(".container").length - 1;

            M.toast({
                html: "card total : " + total + ",<br> last card id : " + last_id
            });
        }); */

        // FAB
        $('.fixed-action-btn').floatingActionButton();
    });

    // Delete Card
    $(document).on("click", ".my-btn", function() {
        var clickedBtnID = $(this).attr('id');
        var id = clickedBtnID.split("-");

        $("#card-" + id[1]).remove();
        M.toast({
            html: "Deleted"
        });
    });

    // Initialization on Document Ready State
    $(function() {
        $('select').formSelect();
    });

    // select box index change
    $('#selCategory').change(function() {
        var idx = $('#selCategory').val();
        console.log(idx);

        // $('.selProduct option[data-category="' + idx + '"]').remove();
        $(".selProduct option[value='2']").each(function() {
            $(this).remove();
        });
    });

    // Create Card
    function createCard(type) {
        // get last card
        var lastCardID = $(".container:last").attr('id');
        var cardTotal = $(".container").length - 2; //default container and title container

        if (cardTotal < 30) {

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

            if (type == 1) {
                card = $('<div class="col s3"><div class="card hoverable"><div class="card-content"><div class="row"><div class="input-field col s12"><input  id="txtQuestion-' + cardCount + '"  placeholder="Question" type="text" class="validate" require></div></div><div class="row"><div class="input-field col s12"><input placeholder="Answer Text" type="text" class="validate" disabled></div></div></div><div class="card-action"><div class="row"><div class="col s10"></div><div class="col s2"><div id="delete-' + cardCount + '" class="waves-effect waves-light my-btn"><i class="material-icons">delete</i></div></div></div></div></div></div></div>');
            } else if (type == 2) {
                card = $('<div class="col s3"><div class="card hoverable"><div class="card-content"><div class="row"><div class="input-field col s12"><input id="txtQuestion-' + cardCount + '"  placeholder="Question" type="text" class="validate" require></div></div><div id="card-' + cardCount + '-check-child-1" class="row check-child"> <div class="input-field col s8 my-input-field"> <i class = "material-icons prefix my-icon" > check_box_outline_blank </i> <input placeholder = "Option" type = "text"> </div> <div class = "input-field col s1" > <a class = "btn-floating waves-effect btn-small green lighten-1" onclick="addOption(this)"> <i class = "material-icons"> add </i> </a> </div> </div> </div> <div class="card-action my-card-action"> <div class="row"> <div class="col s10"> </div> <div class = "col s2" >  <div id = "delete-' + cardCount + '" class = "waves-effect waves-light my-btn" > <i class = "material-icons">delete</i> </div> </div> </div > </div> </div> </div> </div > ');
            } else if (type == 3) {
                card = $('<div class="col s3"><div class="card hoverable"><div class="card-content"><div class="row"><div class="input-field col s12"><input id="txtQuestion-' + cardCount + '"  placeholder="Question" type="text" class="validate" require></div></div><div id="card-' + cardCount + '-radio-child-1" class="row radio-child"> <div class="input-field col s8 my-input-field"> <i class = "material-icons prefix my-icon" > radio_button_unchecked</i> <input placeholder = "Option" type = "text"> </div> <div class = "input-field col s1" > <a class = "btn-floating waves-effect btn-small green lighten-1" onclick="addOption(this)"> <i class = "material-icons"> add </i> </a> </div> </div> </div> <div class="card-action my-card-action"> <div class="row"> <div class="col s10"> </div> <div class = "col s2" >  <div id = "delete-' + cardCount + '" class = "waves-effect waves-light my-btn" > <i class = "material-icons">delete</i> </div> </div> </div > </div> </div> </div> </div > ');
            }

            container.append(card);
        } else {
            M.toast({
                html: 'Only 30 Questions\'re allowed.'
            });
        }
    }

    // add Check/Radio Option
    function addOption(btnAdd) {
        var id = $(btnAdd).parent().parent().attr('id');
        console.log("parent id : " + id);

        if (getChildCount(id) < 9) {
            var raw = id.split('-');
            var cardNo = raw[1];
            var optionType = raw[2];
            var option = '';

            if (optionType == 'check') {
                option = '<div id="card-' + cardNo + '-check-child-x" class="row check-child"><div class="input-field col s8 my-input-field"><i class="material-icons prefix my-icon">check_box_outline_blank</i><input placeholder="Option" type="text"></div><div class="input-field col s1"><a class="btn-floating waves-effect btn-small red lighten-1 remove"><i class="material-icons">remove</i></a></div></div>';
            } else if (optionType == 'radio') {
                option = '<div id="card-' + cardNo + '-radio-child-x" class="row radio-child"><div class="input-field col s8 my-input-field"><i class="material-icons prefix my-icon">radio_button_unchecked</i><input placeholder="Option" type="text"></div><div class="input-field col s1"><a class="btn-floating waves-effect btn-small red lighten-1 remove"><i class="material-icons">remove</i></a></div></div>';
            }

            if (option != '') {
                $('#' + id).append(option);

                setNewID(id);
            }
        }
    }

    // remove Option
    $(document).on("click", "a.remove", function() {
        $(this).parent().parent().remove();
    });

    // renew ID of Options
    function setNewID(ID) {
        var className = getClassName(ID);
        var raw = ID.split('-');
        $('#' + ID + ' > .' + className).map(function(index) {
            index += 2;
            var newID = 'card-' + raw[1] + '-' + className + '-' + index;
            $(this).attr('id', newID);
        });
    }

    function getClassName(ID) {
        var className = $('#' + ID).attr('class').split(' ').pop();
        return className;
    }

    function getChildCount(ID) {
        var className = getClassName(ID);
        var count = $('#' + ID + ' > .' + className).length;
        return count;
    }
</script>