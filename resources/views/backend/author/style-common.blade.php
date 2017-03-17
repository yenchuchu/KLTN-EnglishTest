<style>
    .add-question {
        background: red;
        padding: 2px 6px;
        cursor: pointer;
        color: white;
        font-size: 17px;
        font-weight: 700;
        border-radius: 12px;
        margin-left: 21px;
        -webkit-box-shadow: 0px 2px 10px rgba(0, 0, 0, .3), 0px 0px 1px rgba(0, 0, 0, .1), inset 0px 1px 0px rgba(255, 255, 255, .25), inset 0px -1px 0px rgba(0, 0, 0, .15);
        -moz-box-shadow: 0px 2px 10px rgba(0, 0, 0, .3), 0px 0px 1px rgba(0, 0, 0, .1), inset 0px 1px 0px rgba(255, 255, 255, .25), inset 0px -1px 0px rgba(0, 0, 0, .15);
        box-shadow: 0px 2px 10px rgba(0, 0, 0, .3), 0px 0px 1px rgba(0, 0, 0, .1), inset 0px 1px 0px rgba(255, 255, 255, .25), inset 0px -1px 0px rgba(0, 0, 0, .15);
    }

    .add-item {
        background: rgb(251, 56, 56);
        border-radius: 24px;
        color: white;
        cursor: pointer;
        padding: 5px 16px;
        float: right;
        font-weight: 700;
        font-size: 26px;
        -webkit-box-shadow: 0px 2px 10px rgba(0, 0, 0, .3), 0px 0px 1px rgba(0, 0, 0, .1), inset 0px 1px 0px rgba(255, 255, 255, .25), inset 0px -1px 0px rgba(0, 0, 0, .15);
        -moz-box-shadow: 0px 2px 10px rgba(0, 0, 0, .3), 0px 0px 1px rgba(0, 0, 0, .1), inset 0px 1px 0px rgba(255, 255, 255, .25), inset 0px -1px 0px rgba(0, 0, 0, .15);
        box-shadow: 0px 2px 10px rgba(0, 0, 0, .3), 0px 0px 1px rgba(0, 0, 0, .1), inset 0px 1px 0px rgba(255, 255, 255, .25), inset 0px -1px 0px rgba(0, 0, 0, .15);
    }

    .save-answer-questions,
    .save-tick-true-false,
    .save-multiple-choice,
    .save-complete-word,
    .save-find-errors,
    .save-speaking {
        background: rgb(69, 224, 32);
        border-radius: 24px;
        color: white;
        padding: 4px 12px;
        margin-top: 10px;
        float: right;
        font-weight: 700;
        font-size: 26px;
        -webkit-box-shadow: 0px 2px 10px rgba(0, 0, 0, .3), 0px 0px 1px rgba(0, 0, 0, .1), inset 0px 1px 0px rgba(255, 255, 255, .25), inset 0px -1px 0px rgba(0, 0, 0, .15);
        -moz-box-shadow: 0px 2px 10px rgba(0, 0, 0, .3), 0px 0px 1px rgba(0, 0, 0, .1), inset 0px 1px 0px rgba(255, 255, 255, .25), inset 0px -1px 0px rgba(0, 0, 0, .15);
        box-shadow: 0px 2px 10px rgba(0, 0, 0, .3), 0px 0px 1px rgba(0, 0, 0, .1), inset 0px 1px 0px rgba(255, 255, 255, .25), inset 0px -1px 0px rgba(0, 0, 0, .15);
    }

    .save-answer-questions:hover, .save-answer-questions:focus,
    .save-tick-true-false:hover, .save-tick-true-false:focus,
    .save-multiple-choice:hover, .save-multiple-choice:focus,
    .save-complete-word:hover, .save-complete-word:focus,
    .save-find-errors:hover, .save-find-errors:focus,
    .save-speaking:hover, .save-speaking:focus {
        color: snow;
        text-decoration: underline;
        background: rgba(69, 224, 32, 0.69);
    }

    .add-item:hover,
    .add-question:hover {
        color: snow;
        text-decoration: none;
        background: rgba(251, 56, 56, 0.84);
    }

    .add-item:focus,
    .add-question:focus {
        color: white;
        text-decoration: none;
    }

    .lable-point {
        float: left;
        margin-right: 6px;
    }

    .input-point {
        width: 64%;
    }

    .i-remove-item {
        font-size: 20px;
        float: right;
        margin-bottom: 10px;
        margin-top: 5px;
        color: rgba(128, 128, 128, 0.75);
        cursor: pointer;
        text-align: right;
    }

    .i-remove-item:hover {
        color: rgb(128, 128, 128);
    }

    .span-choose-answer input[type="radio"],
    .span-tick-true-false input[type="radio"] {
        margin-right: 5px;
    }

    .bookmap_form {
        width: 30%;
        float: left;
    }

    .div-wrap-option-answers {
        padding-left: 0;
        margin-left: 17px;
        width: 100%
    }

    .div-wrap-option-answers .col-lg-11 {
        padding-left: 0;
        padding-right: 0;
    }

    .btn-create-new-test {
        float: right;
    }

    .alert-note {
        font-size: 19px;
        float: right;
        padding-top: 15px;
        color: #f0ad4e;
        cursor: pointer;
    }

</style>