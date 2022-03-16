<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__ . '/../src')
    ->exclude('var')
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony'                                   => true,
        '@DoctrineAnnotation'                        => true,
        '@PSR2'                                      => true,
        'array_syntax'                               => ['syntax' => 'short'],
        'blank_line_after_namespace'                 => true,
        'blank_line_before_statement'                => ['statements' => ['return']],
        'cast_spaces'                                => ['space' => 'none'],
        'concat_space'                               => ['spacing' => 'one'],
        'declare_strict_types'                       => true,
        'declare_equal_normalize'                    => ['space' => 'single'],
        'dir_constant'                               => true,
        'function_typehint_space'                    => true,
        'lowercase_cast'                             => true,
        'modernize_types_casting'                    => true,
        'native_function_casing'                     => true,
        'native_function_invocation'                 => false,
        'no_alias_functions'                         => true,
        'no_blank_lines_after_phpdoc'                => true,
        'no_empty_phpdoc'                            => true,
        'no_empty_statement'                         => true,
        'no_extra_blank_lines'                       => true,
        'no_leading_import_slash'                    => true,
        'no_leading_namespace_whitespace'            => true,
        'no_null_property_initialization'            => true,
        'no_short_bool_cast'                         => true,
        'no_singleline_whitespace_before_semicolons' => true,
        'no_superfluous_elseif'                      => true,
        'no_trailing_comma_in_singleline_array'      => true,
        'no_unneeded_control_parentheses'            => true,
        'no_unused_imports'                          => true,
        'no_useless_else'                            => true,
        'no_whitespace_in_blank_line'                => true,
        'ordered_imports'                            => ['sort_algorithm' => 'alpha', 'imports_order' => ['class', 'const', 'function']],
        'phpdoc_no_access'                           => true,
        'phpdoc_no_empty_return'                     => true,
        'phpdoc_no_package'                          => true,
        'phpdoc_scalar'                              => true,
        'phpdoc_trim'                                => true,
        'phpdoc_types'                               => true,
        'phpdoc_types_order'                         => [
            'null_adjustment' => 'always_last',
            'sort_algorithm'  => 'none'
        ],
        'return_type_declaration' => ['space_before' => 'none'],
        'single_quote'                               => true,
        'whitespace_after_comma_in_array'            => true,
        'align_multiline_comment'                    => ['comment_type' => 'phpdocs_only'],
        'list_syntax'                                => ['syntax' => 'short'],
        'visibility_required'                        => ['elements' => ['property', 'method']],
        'yoda_style'                                 => false,
        'increment_style'   =>  [
            'style' => 'post'
        ],
    ])
    ->setFinder($finder)
    ->setRiskyAllowed(true)
    ->setCacheFile(__DIR__ . '/.php_cs.cache')
    ;
