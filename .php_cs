<?php

$finder = PhpCsFixer\Finder::create()
    ->name('*.php')
    ->name('console')
    ->in('bin')
    ->in('src')
    ->in('config')
    ->in('tests');

return PhpCsFixer\Config::create()
    ->setRules([
        'align_multiline_comment'                     => ['comment_type' => 'phpdocs_like'],
        'binary_operator_spaces'                      => ['default' => 'single_space', 'operators' => ['=>' => 'align_single_space_minimal']],
        'blank_line_after_namespace'                  => true,
        'blank_line_after_opening_tag'                => true,
        //'braces'                                      => ['position_after_functions_and_oop_constructs' => 'same'], // Empty exception classes affected
        'cast_spaces'                                 => ['space' => 'none'],
        'concat_space'                                => ['spacing' => 'one'],
        'declare_equal_normalize'                     => ['space' => 'none'],
        'elseif'                                      => true,
        'encoding'                                    => true,
        'full_opening_tag'                            => true,
        'function_declaration'                        => ['closure_function_spacing' => 'one'],
        'function_typehint_space'                     => true,
        'indentation_type'                            => true, // tab indents cause array misalignment with binary_operator_spaces
        'line_ending'                                 => true,
        'linebreak_after_opening_tag'                 => true,
        'lowercase_cast'                              => true,
        'lowercase_constants'                         => true,
        'lowercase_keywords'                          => true,
        'magic_constant_casing'                       => true,
        'method_argument_space'                       => ['ensure_fully_multiline' => true, 'keep_multiple_spaces_after_comma' => false],
        'method_separation'                           => true,
        'native_function_casing'                      => true,
        'no_blank_lines_after_class_opening'          => true,
        'no_blank_lines_after_phpdoc'                 => true,
        'no_closing_tag'                              => true,
        'no_empty_comment'                            => true,
        'no_empty_phpdoc'                             => true,
        'no_extra_consecutive_blank_lines'            => ['tokens' => ['extra']],
        'no_leading_import_slash'                     => true,
        'no_leading_namespace_whitespace'             => true,
        'no_mixed_echo_print'                         => ['use' => 'echo'],
        'no_multiline_whitespace_around_double_arrow' => true,
        'no_multiline_whitespace_before_semicolons'   => true,
        'no_short_bool_cast'                          => true,
        'no_singleline_whitespace_before_semicolons'  => true,
        'no_spaces_after_function_name'               => true,
        'no_spaces_inside_parenthesis'                => true,
        'no_superfluous_elseif'                       => true,
        'no_trailing_comma_in_singleline_array'       => true,
        'no_trailing_whitespace'                      => true,
        'no_trailing_whitespace_in_comment'           => true,
        //'no_unneeded_control_parentheses'             => true,
        'no_unneeded_curly_braces'                    => true,
        'no_unneeded_final_method'                    => true,
        'no_useless_else'                             => true,
        'no_whitespace_before_comma_in_array'         => true,
        'no_whitespace_in_blank_line'                 => true,
        'normalize_index_brace'                       => true,
        'object_operator_without_whitespace'          => true,
        //'ordered_class_elements'                      => [],
        'ordered_imports'                             => ['sortAlgorithm' => 'alpha'],
        'phpdoc_add_missing_param_annotation'         => [],
        'phpdoc_align'                                => [],
        'phpdoc_indent'                               => true,
        'phpdoc_no_package'                           => true,
        'phpdoc_scalar'                               => true,
        'phpdoc_single_line_var_spacing'              => true,
        'phpdoc_trim'                                 => true,
        'return_type_declaration'                     => ['space_before' => 'none'],
        //'self_accessor'                               => true,
        'short_scalar_cast'                           => true,
        'single_blank_line_at_eof'                    => true,
        'single_blank_line_before_namespace'          => true,
        'single_class_element_per_statement'          => ['elements' => ['const', 'property']],
        'single_import_per_statement'                 => true,
        'single_line_after_imports'                   => true,
        'single_line_comment_style'                   => true,
        //'single_quote'                                => true,
        'space_after_semicolon'                       => true,
        'standardize_not_equals'                      => true,
        'switch_case_semicolon_to_colon'              => true,
        'switch_case_space'                           => true,
        'ternary_operator_spaces'                     => true,
        'trim_array_spaces'                           => true,
    ])
    ->setLineEnding("\n")
    ->setIndent("    ")
    ->setFinder($finder);
