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

    .card .card-action {
        padding-bottom: 0px;
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

    /* FIXME: no need when card type = text */
    /* .my-card-action {
        margin-top: 3rem;
    } */
</style>

<!-- STARTING BUTTON --
    <button id="btn_add" class="iFixed">Add new list item</button>
    <p>Click the above button to dynamically add new list items. You can remove it later.</p>
    <ol>
        <li>list item</li>
    </ol> -->

<!-- TODO:
    1. Clone Data
    2. Select and Event
        1. Change Child (Checkbox / Radio)

    TODO: Draggleable Card
-->
<!-- CARD -->
<div class="container" id="card-1">
    <div class="col s3">
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <div class="input-field col s8">
                        <input id="txtQuestion-1" placeholder="Question" type="text" class="validate" require>
                    </div>
                    <div id="selDiv-1" class="input-field col s4">
                        <select id="selType-1" class="my-sel" onchange="typeChange(this)">
                            <!-- <option value="" disabled selected>Choose your option</option> -->
                            <option value="1" data-icon="/img/title.svg">Text</option>
                            <option value="2" data-icon="/img/check_box.svg">CheckBox</option>
                            <option value="3" data-icon="/img/radio_button.svg">Radio</option>
                        </select>
                        <label>Select Question Type</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12"><input placeholder="Answer Text" type="text" class="validate" disabled></div>
                </div>
                <!-- <div id="child-1" class="row">
                    <div class="input-field input-icons col s1">
                        <i class="material-icons icon">check_box_outline_blank</i>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Answer Text" type="text" class="validate">
                    </div>
                    <div class="input-field col s1">
                        <a class="btn-floating waves-effect btn-small"><i class="material-icons">add</i></a>
                    </div>
                </div> -->

                <!-- <div id="child-1" class="row">
                    <div class="input-field col s8 my-input-field">
                        <i class="tiny material-icons prefix my-icon">check_box_outline_blank</i>
                        <input placeholder="Answer Text" type="text">
                    </div>
                    <div class="input-field col s1">
                        <a class="btn-floating waves-effect btn-small red lighten-1"><i class="material-icons">remove
                            </i></a>
                    </div>

                    <div class="input-field col s8 my-input-field">
                        <i class="tiny material-icons prefix my-icon">check_box_outline_blank</i>
                        <input placeholder="Answer Text" type="text">
                    </div>
                    <div class="input-field col s1">
                        <a class="btn-floating waves-effect btn-small red lighten-1"><i class="material-icons">remove</i></a>
                    </div>

                    <div class="input-field col s8 my-input-field">
                        <i class="tiny material-icons prefix my-icon">check_box_outline_blank</i>
                        <input value="Other" type="text" disabled>
                    </div>
                    <div class="input-field col s1">
                        <a class="btn-floating waves-effect btn-small red lighten-1"><i class="material-icons">remove</i></a>
                    </div> -->

                <!-- <div class="input-field col s4 my-input-field">
                        <i class="tiny material-icons prefix my-icon">check_box_outline_blank</i>
                        <input placeholder="Add option" type="text">
                    </div>
                    <div class="input-field col s3">
                        or &nbsp;<a class="waves-effect"> add "Other"</a>
                    </div> -->
            </div>

            <div class="card-action my-card-action">
                <div class="row">
                    <div class="col s10"></div>
                    <!-- <div class="col s1">
                        <div id="clone-1" class="waves-effect waves-light my-btn"><i class="material-icons">content_copy</i></div>
                    </div> -->
                    <div class="col s2">
                        <div id="delete-1" class="waves-effect waves-light my-btn"><i class="material-icons ">delete</i></div>
                    </div>
                    <!-- <div class="col s5 pull-s7">
                    </div> -->
                    <!-- <div class="col s4">
                        <div class="switch">
                            Required
                            <label>
                                <input type="checkbox">
                                <span class="lever"></span>
                            </label>
                        </div>
                    </div> -->
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
        <!-- <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li> -->
        <li onclick="createCard(1)"><a class="btn-floating yellow darken-1"><i class="material-icons">title</i></a></li>
        <li onclick="typeChange(2)"><a class="btn-floating green"><i class="material-icons">check_box</i></a></li>
        <li onclick="typeChange(3)"><a class="btn-floating blue"><i class="material-icons">radio_button_checked</i></a></li>
    </ul>
</div>

<!-- TOAST -->
<a id="add" onclick="typeChange()" class="btn">
    <i class="material-icons left">ac_unit</i>Toast!</a>

<script>
    var cardCount = 1;

    $(function() {

        $("#btn_add").click(function() {
            $("ol").append("<li>list item <a href='javascript:void(0);' class='remove'>×</a></li>");
        });

        $(document).on("click", "a.remove", function() {
            $(this).parent().remove();
        });

        $("#add").click(function() {
            // var total_card = $(".container").length;
            var last_id = $(".container:last").attr("id");
            // var next_id = last_id + 1;
            // $(".container:last").after(paragraph);

            // $(".container").clone().appendTo(".container:after");

            // $("body").append($("#card-1").clone(true));

            // $(this).clone().insertAfter(this);

            M.toast({
                html: last_id
            });
        });

        // FAB
        $('.fixed-action-btn').floatingActionButton();

        // DROPDOWN
        // $('.dropdown-trigger').dropdown();

        // SELECT
        $(document).ready(function() {
            $('select').formSelect();
        });
    });

    // SELECT index change event
    /*     $("select").change(function() {
            // var value = $("#selType-1").val(); //$("#selType-1 option:selected").text();
            // alert(value);
            var id = $(this).attr('id');
            alert(id);
        }); */

    $('select.my-sel').on('change', function(e) {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        console.log(e);
    });

    // test select
    function test(e) {
        // var id = $(this).attr('id');
        var id = e.id;
        var selected = $("#" + id).val();
        console.log(id + " " + selected);
    }

    // Copy and Delete
    $(document).on("click", ".my-btn", function() {
        var clickedBtnID = $(this).attr('id');
        var btnType = clickedBtnID.split("-");
        if (btnType[0] == "clone") {
            M.toast({
                html: btnType[0] +
                    clickedBtnID
            });
            createCard(btnType[1]);
            // cloneMe(btnType[1]);
        }
        if (btnType[0] == "delete") {
            M.toast({
                html: btnType[0]
            });
            deleteMe(btnType[1]);
        }
    });

    // Create Card
    function createCard(id) {
        ++cardCount;
        var ID = 'card-' + cardCount;
        var container = $('<div class="container" id="' + ID + '"></div>');
        // $('#card-' + id).after(container);
        container.insertAfter($('#card-' + id));

        var card = $('<div class="col s3"><div class="card"><div class="card-content"><div class="row"><div class="input-field col s8"><input  id="txtQuestion-' + cardCount + '"  placeholder="Question" type="text" class="validate" require></div><div  id="selDiv-' + cardCount + '" class="input-field col s4"><select id="selType-' + cardCount + '" class="my-sel"  onchange="typeChange(this)"><option value="1" data-icon="/img/title.svg">Text</option><option value="2" data-icon="/img/check_box.svg">CheckBox</option><option value="3" data-icon="/img/radio_button.svg">Radio</option></select><label>Select Question Type</label></div></div><div class="row"><div class="input-field col s12"><input placeholder="Answer Text" type="text" class="validate" disabled></div></div><div class="card-action"><div class="row"><div class="col s6"></div><div class="col s1"><div id="clone-' + cardCount + '" class="waves-effect waves-light my-btn"><i class="material-icons">content_copy</i></div></div><div class="col s1"><div id="delete-' + cardCount + '" class="waves-effect waves-light my-btn"><i class="material-icons">delete</i></div></div><div class="col s1"></div><div class="col s4"><div class="switch">Required<label> <input type="checkbox"><span class="lever"></span></label></div></div></div></div></div></div></div></div>');

        // Initialize
        $(function() {
            $('select').formSelect();
        });

        container.append(card);
    }

    // TODO: Clone Card
    function cloneMe(id) {
        $(function() {
            $('select').formSelect();
        });

        // var cloned = $("#card-" + id).clone();
        // cloned.find("#selDiv-"+id).clear();

        // $(".container").clone().appendTo(".container:after");

        // $("body").append($("#card-1").clone(true));

        // $("#card-" + id).clone().insertAfter("#card-" + id);
    }

    // Delete Card
    function deleteMe(id) {
        M.toast({
            html: "Deleted"
        });

        $("#card-" + id).remove();
    }

    function typeChange(select) {
        var selected = $("#" + select.id).val();

        M.toast({
            html: selected
        });
        if (selected == 1) {
            typeText();
        }
        if (selected == 2) {
            typeCheck();
        }
        if (selected == 3) {
            typeRadio();
        }
    }

    function typeText() {
        // createCard(1);
        M.toast({
            html: 'in text'
        });
    }

    function typeCheck() {
        M.toast({
            html: 'in check'
        });
    }

    function typeRadio() {
        M.toast({
            html: 'in radio'
        });
    }
</script>