<?php

return PhpCsFixer\Config::create()
    ->setRules(array(
        '@PSR2' => true,
        // Each element of an array must be indented exactly once.
        'array_indentation' => true,
        // Whether to use the or array syntax.long/short
        'array_syntax' => array('syntax' => 'short'),
        // Calling on multiple items should be done in one call .unset
        'combine_consecutive_unsets' => true,
        // Methods must be separated with one blank line.
        'method_separation' => true,
        // Multi-line whitespace before closing semicolon are prohibited.
        'no_multiline_whitespace_before_semicolons' => true,
        // Convert double quotes to single quotes for simple strings.
        'single_quote' => true,
        // PHP keywords MUST be in lower case.
        'lowercase_keywords' => true,
        // Binary operators should be surrounded by space as configured.
        'binary_operator_spaces' => array(
            // Whether to apply, remove or ignore double arrows alignment. Allowed values: false\null\true
            'align_double_arrow' => false,
            // Whether to apply, remove or ignore equals alignment. Allowed values: false\null\true
            'align_equals' => false,
        ),
        // Ensure there is no code on the same line as the PHP open tag and it is followed by a blank line.
        'blank_line_after_opening_tag' => true,
        // An empty line feed should precede a return statement.
        'blank_line_before_return' => true,

        // The body of each structure MUST be enclosed by braces. Braces should be properly placed. Body of braces should be properly indented.
        'braces' => array(
            // Whether single line anonymous class with empty body notation should be allowed.
            'allow_single_line_anonymous_class_with_empty_body' => true,
            // Whether single line lambda notation should be allowed.
            'allow_single_line_closure' => true,
            // whether the opening brace should be placed on "next" or "same" line after classy constructs (non-anonymous classes, interfaces, traits, methods and non-lambda functions).
            'position_after_functions_and_oop_constructs' => 'same',
            // whether the opening brace should be placed on "next" or "same" line after control structures.
            'position_after_control_structures' => 'same',
            // whether the opening brace should be placed on "next" or "same" line after anonymous constructs (anonymous classes and lambda functions).
            'position_after_anonymous_constructs' => 'same',
        ),

        // spacing to apply between cast and variable. Allowed values: true/false
        'cast_spaces' => false,
        // Whitespace around the keywords of a class, trait or interfaces definition should be one space.
        'class_definition' => array('singleLine' => true),
        // Concatenation should be spaced according configuration. Allowed values:  'none''one'
        'concat_space' => array('spacing' => 'one'),
        // Equal sign in declare statement should be surrounded by spaces or not following configuration. values:  true\false
        'declare_equal_normalize' => true,
        // Ensure single space between function's argument and its typehint.
        'function_typehint_space' => true,
        // Single line comments should use double slashes // and not hash #.
        'hash_to_slash_comment' => true,
        // Include/Require and file path should be divided with a single space. File path should not be placed under brackets.
        'include' => true,
        // Cast should be written in lower case.
        'lowercase_cast' => true,
        // Function defined by PHP should be called using the correct casing.
        'native_function_casing' => true,
        // All instances created with new keyword must be followed by braces.
        'new_with_braces' => true,
        // There should be no empty lines after class opening brace.
        'no_blank_lines_after_class_opening' => true,
        // There should not be blank lines between docblock and the documented element.
        'no_blank_lines_after_phpdoc' => true,
        // There should not be any empty comments.
        'no_empty_comment' => true,
        // There should not be empty PHPDoc blocks.
        'no_empty_phpdoc' => true,
        // Remove useless (semicolon) statements.
        'no_empty_statement' => true,
        // Removes extra blank lines and/or blank lines following configuration.
        // Allowed values: a subset of ['break', 'case', 'continue', 'curly_brace_block', 'default', 'extra',
        // 'parenthesis_brace_block', 'return', 'square_brace_block', 'switch', 'throw', 'use', 'useTrait', 'use_trait']
        // Default value: ['extra']
        'no_extra_consecutive_blank_lines' => array(
            'curly_brace_block',
            'extra',
            'parenthesis_brace_block',
            'square_brace_block',
            'throw',
            'use',
        ),
        // Remove leading slashes in clauses.use
        'no_leading_import_slash' => true,
        // The namespace declaration line shouldn't contain leading whitespace.
        'no_leading_namespace_whitespace' => true,
        // Either language construct print or echo should be used.
        // 'no_mixed_echo_print' => array('use' => 'echo'),
        // Operator => should not be surrounded by multi-line whitespaces.
        'no_multiline_whitespace_around_double_arrow' => true,
        // Short cast using double exclamation mark should not be used.bool
        // 'no_short_bool_cast' => true,
        // Single-line whitespace before closing semicolon are prohibited.
        'no_singleline_whitespace_before_semicolons' => true,
        // There MUST NOT be spaces around offset braces.
        'no_spaces_around_offset' => true,
        // Remove trailing commas in list function calls.
        'no_trailing_comma_in_list_call' => true,
        // PHP single-line arrays should not have trailing comma.
        'no_trailing_comma_in_singleline_array' => true,
        // Removes unneeded parentheses around control statements.
        'no_unneeded_control_parentheses' => true,
        // Unused use statements must be removed.
        'no_unused_imports' => true,
        // In array declaration, there MUST NOT be a whitespace before each comma.
        'no_whitespace_before_comma_in_array' => true,
        // Remove trailing whitespace at the end of blank lines.
        'no_whitespace_in_blank_line' => true,
        // Array index should always be written by using square braces.
        // 'normalize_index_brace' => true,
        // There should not be space before or after object T_OBJECT_OPERATOR ->.
        'object_operator_without_whitespace' => true,
        // PHPUnit annotations should be a FQCNs including a root namespace.
        // 'php_unit_fqcn_annotation' => true,
        // All items of the given phpdoc tags must be either left-aligned or (by default) aligned vertically.
        'phpdoc_align' => array('align' => 'vertical'),
        // PHPDoc annotation descriptions should not be a sentence.
        // 'phpdoc_annotation_without_dot' => true,
        // Docblocks should have the same indentation as the documented subject.
        'phpdoc_indent' => true,
        // Fix PHPDoc inline tags, make always inline.@inheritdoc
        'phpdoc_inline_tag' => true,
        // @access annotations should be omitted from PHPDoc.
        'phpdoc_no_access' => true,
        // No alias PHPDoc tags should be used.
        // 'phpdoc_no_alias_tag' => true,
        // @return void and @return null annotations should be omitted from PHPDoc.
        // 'phpdoc_no_empty_return' => true,
        // @package and annotations should be omitted from PHPDoc.@subpackage
        // 'phpdoc_no_package' => true,
        // Classy that does not inherit must not have tags.@inheritdoc
        // 'phpdoc_no_useless_inheritdoc' => true,
        // The type of annotations of methods returning a reference to itself must the configured one.@return
        // 'phpdoc_return_self_reference' => true,
        // Scalar types should always be written in the same form. int not integer, bool not boolean, float not real or double.
        // 'phpdoc_scalar' => true,
        // Annotations in PHPDoc should be grouped together so that annotations of the same type immediately follow each other, and annotations of a different type are separated by a single blank line.
        // 'phpdoc_separation' => true,
        // Single line @var PHPDoc should have proper spacing.
        // 'phpdoc_single_line_var_spacing' => true,
        // PHPDoc summary should end in either a full stop, exclamation mark, or question mark.
        // 'phpdoc_summary' => true,
        // Docblocks should only be used on structural elements.
        // 'phpdoc_to_comment' => true,
        // PHPDoc should start and end with content, excluding the very first and last line of the docblocks.
        // 'phpdoc_trim' => true,
        // The correct case must be used for standard PHP types in PHPDoc
        // 'phpdoc_types' => true,
        // @var and @type annotations of classy properties should not contain the name.
        // 'phpdoc_var_without_name' => true,
        // Pre incrementation/decrementation should be used if possible.
        // 'pre_increment' => true,
        // There should be one or no space before colon, and one space after it in return type declarations, according to configuration.
        // 'return_type_declaration' => true,
        // Inside class or interface element self should be preferred to the class name itself.
        // 'self_accessor' => true,
        // Cast (boolean) and (integer) should be written as (bool) and (int), (double) and (real) as (float), (binary) as (string).
        // 'short_scalar_cast' => true,
        // There should be exactly one blank line before a namespace declaration.
        'single_blank_line_before_namespace' => true,
        // There MUST NOT be more than one property or constant declared per statement.
        // 'single_class_element_per_statement' => true,
        // Fix whitespace after a semicolon.
        'space_after_semicolon' => true,
        // Replace all <> with !=.
        // 'standardize_not_equals' => true,
        // Standardize spaces around ternary operator.
        'ternary_operator_spaces' => true,
        // PHP multi-line arrays should have a trailing comma.
        'trailing_comma_in_multiline_array' => true,
        // Arrays should be formatted like function/method arguments, without leading or trailing single line space.
        'trim_array_spaces' => true,
        // Unary operators should be placed adjacent to their operands.
        'unary_operator_spaces' => true,
        // In array declaration, there MUST be a whitespace after each comma.
        'whitespace_after_comma_in_array' => true,
    ))
    //->setIndent("\t")
    ->setLineEnding("\n");
