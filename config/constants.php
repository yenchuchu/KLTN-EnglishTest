<?php
return [
    'skill' => [
        // key's name is name model.
        'Read' => [
            'answer_questions' => 'Answer and question',
            'classify_words' => 'Classify words',
            'complete_words' => 'Complete words',
            'find_errors' => 'Find Errors',
            'multiple_choices' => 'Multiple choice',
            'tick_circle_true_falses' => 'Tick circle true or false',
            'underlines' => 'Underlines',
        ],
        'Listen' => [
            'complete_tables' => 'Complete Table',
            'table_ticks' => 'Table Tick',
            'table_matchs' => 'Table Matchs',
            'complete_sentences' => 'Complete Sentences',
            'listen_ticks' => 'Listen and Tick',
            'tick_crosses' => 'Tick Cross',
            'fill_numbers' => 'Listen And Fill In One Number',
        ],
        'Write' => [],
        'Speak' => []

    ],
    // point = 20 tương ứng với mỗi bài. chia đều 20 điểm cho tất cả số câu trong bài.
    'point' => 25,
    'sum_point' => 100,

];
