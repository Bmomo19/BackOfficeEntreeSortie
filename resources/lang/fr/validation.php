<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Le champ :attribute doit être accepté.',
    'active_url' => "L'url n'est pas une URL valide.",
    'after' => 'le champ :attribute doit être une date après :date.',
    'after_or_equal' => 'Le champ :attribute doit être une date après ou égale à :date.',
    'alpha' => 'Le champ :attribute ne peut contenir que des lettres.',
    'alpha_dash' => 'Le champ :attribute ne peut contenir que des lettres, des chiffres, des tirets et des traits de soulignement.',
    'alpha_num' => 'Le champ :attribute ne peut contenir que des lettres et des chiffres.',
    'array' => 'Le champ :attributedoit être un tableau.',
    'before' => 'Le champ :attribute doit être une date avant :date.',
    'before_or_equal' => 'Le champ :attribute doit être une date antérieure ou égale à :date.',
    'between' => [
        'numeric' => 'Le champ :attribute Doit être entre :min et :max.',
        'file' => 'Le champ :attribute Doit être entre :min et :max kilobytes.',
        'string' => 'Le champ :attribute Doit être entre :min et :max characters.',
        'array' => 'Le champ :attribute doit avoir entre :min et :max items.',
    ],
    'boolean' => 'Le champ :attribute Le champ doit être vrai ou faux.',
    'confirmed' => 'la confirmation ne correspond pas.',
    'date' => "Le champ :attribute n'est pas une date valide.",
    'date_equals' => 'Le champ :attribute doit être une date égale à :date.',
    'date_format' => 'Le champ :attribute ne correspond pas au format :format.',
    'different' => 'Le champ :attribute et :other doivent être différent.',
    'digits' => 'Le champ :attribute doit être :digits chiffres.',
    'digits_between' => 'Le champ :attribute Doit être entre :min et :max chiffres.',
    'dimensions' => "Le champ :attribute a des dimensions d'image non valides.",
    'distinct' => 'Le champ :attribute a une valeur en double.',
    'email' => 'Le champ :attribute Doit être une adresse e-mail valide.',
    'ends_with' => 'Le champ :attribute doit se terminer par l’un des éléments suivants: :values',
    'exists' => 'Le champ sélectionné :attribute est invalide.',
    'file' => 'Le champ :attribute doit être un fichier.',
    'filled' => 'Le champ :attribute le champ doit avoir une valeur.',
    'gt' => [
        'numeric' => 'Le champ :attribute doit être supérieur à :value.',
        'file' => 'Le champ :attribute doit être supérieur à :value kilobytes.',
        'string' => 'Le champ :attribute doit être supérieur à :value caractère.',
        'array' => 'Le champ :attribute doit avoir plus de :value items.',
    ],
    'gte' => [
        'numeric' => 'Le champ :attribute doit être supérieur ou égal :value.',
        'file' => 'Le champ :attribute doit être supérieur ou égal :value kilobytes.',
        'string' => 'Le champ :attribute doit être supérieur ou égal :value caractère.',
        'array' => 'Le champ :attribute doit avoir :value items ou plus.',
    ],
    'image' => 'Le champ :attribute doit être une image.',
    'in' => 'Le champ sélectionné :attribute est invalide.',
    'in_array' => "Le champ :attribute le champ n'existe pas dans :other.",
    'integer' => 'Le champ :attribute Doit être un entier.',
    'ip' => 'Le champ :attribute doit être une adresse IP valide.',
    'ipv4' => 'Le champ :attribute doit être une adresse IPv4 valide.',
    'ipv6' => 'Le champ :attribute doit être une adresse IPv6 valide.',
    'json' => 'Le champ :attribute doit être une chaîne JSON valide.',
    'lt' => [
        'numeric' => 'Le champ :attribute doit être inférieur à :value.',
        'file' => 'Le champ :attribute doit être inférieur à :value kilobytes.',
        'string' => 'Le champ :attribute doit être inférieur à :value caractère.',
        'array' => 'Le champ :attribute doit avoir moins de :value items.',
    ],
    'lte' => [
        'numeric' => 'Le champ :attribute doit être inférieur ou égal :value.',
        'file' => 'Le champ :attribute doit être inférieur ou égal :value kilobytes.',
        'string' => 'Le champ :attribute doit être inférieur ou égal :value caractère.',
        'array' => 'Le champ :attribute ne doit pas avoir plus de :value items.',
    ],
    'max' => [
        'numeric' => 'Le champ :attribute ne peut pas être supérieur à :max.',
        'file' => 'Le champ :attribute ne peut pas être supérieur à :max kilobytes.',
        'string' => 'Le champ :attribute ne peut pas être supérieur à :max caractère.',
        'array' => 'Le champ :attribute peut ne pas avoir plus de :max items.',
    ],
    'mimes' => 'Le champ :attribute doit être un fichier de type: :values.',
    'mimetypes' => 'Le champ :attribute doit être un fichier de type: :values.',
    'min' => [
        'numeric' => 'Le champ :attribute doit être au moins :min.',
        'file' => 'Le champ :attribute doit être au moins :min kilobytes.',
        'string' => 'Le champ :attribute doit être au moins :min caractère.',
        'array' => 'Le champ :attribute doit avoir au moins :min items.',
    ],
    'not_in' => 'Le champ sélectionné :attribute est invalide.',
    'not_regex' => 'Le champ :attribute format est invalide.',
    'numeric' => 'Le champ :attribute doit être un nombre.',
    'present' => 'Le champ :attribute le champ doit être présent.',
    'regex' => 'Le champ :attribute format est invalide.',
    'required' => 'Le champ :attribute est requis.',
    'required_if' => 'Le champ :attribute est requis lorsque :other est :value.',
    'required_unless' => 'Le champ :attribute est obligatoire sauf si :other est dans :values.',
    'required_with' => 'Le champ :attribute est requis lorsque :values est present.',
    'required_with_all' => 'Le champ :attribute est requis lorsque :values sont present.',
    'required_without' => "Le champ :attribute est requis lorsque :values n'est pas present.",
    'required_without_all' => 'Le champ :attribute est requis lorsque aucun de :values sont present.',
    'same' => 'Le champ :attribute et :other doivent correspondre.',
    'size' => [
        'numeric' => 'Le champ :attribute doit être :size.',
        'file' => 'Le champ :attribute doit être :size kilobytes.',
        'string' => 'Le champ :attribute doit être :size characters.',
        'array' => 'Le champ :attribute doit contenir :size items.',
    ],
    'starts_with' => 'Le champ :attribute doit commencer par l’un des éléments suivants: :values',
    'string' => 'Le champ :attribute doit être une chaîne',
    'timezone' => 'Le champ :attribute doit être une zone valide.',
    'unique' => 'Le :attribute a déjà été pris.',
    'uploaded' => 'Échec du téléchargement pour :attribute',
    'url' => 'Le format du champ :attribute est invalide.',
    'uuid' => 'Le champ :attribute doit être un UUID valide.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
