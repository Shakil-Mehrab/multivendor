<?php

declare(strict_types=1);

namespace PackageVersions;

use OutOfBoundsException;

/**
 * This class is generated by ocramius/package-versions, specifically by
 * @see \PackageVersions\Installer
 *
 * This file is overwritten at every run of `composer install` or `composer update`.
 */
final class Versions
{
    public const ROOT_PACKAGE_NAME = 'laravel/laravel';
    /**
     * Array of all available composer packages.
     * Dont read this array from your calling code, but use the \PackageVersions\Versions::getVersion() method instead.
     *
     * @var array<string, string>
     * @internal
     */
    public const VERSIONS          = array (
  'asm89/stack-cors' => 'v2.0.1@23f469e81c65e2fb7fc7bce371fbdc363fe32adf',
  'bacon/bacon-qr-code' => '2.0.2@add6d9ff97336b62f95a3b94f75cea4e085465b2',
  'brick/math' => '0.9.1@283a40c901101e66de7061bd359252c013dcc43c',
  'darryldecode/cart' => '4.2.0@7dcaddea121bf7724834ff3448b0d052a458d207',
  'dasprid/enum' => '1.0.2@6ccc0d7141a7f149e3c56cb0ce5f05d9152cfd07',
  'dnoegel/php-xdg-base-dir' => 'v0.1.1@8f8a6e48c5ecb0f991c2fdcf5f154a47d85f9ffd',
  'doctrine/inflector' => '2.0.3@9cf661f4eb38f7c881cac67c75ea9b00bf97b210',
  'doctrine/lexer' => '1.2.1@e864bbf5904cb8f5bb334f99209b48018522f042',
  'dragonmantank/cron-expression' => '3.0.1@fa4e95ff5a7f1d62c3fbc05c32729b7f3ca14b52',
  'egulias/email-validator' => '2.1.21@563d0cdde5d862235ffe24a158497f4d490191b5',
  'fideloper/proxy' => '4.4.0@9beebf48a1c344ed67c1d36bb1b8709db7c3c1a8',
  'fruitcake/laravel-cors' => 'v2.0.2@4b19bfc3bd422948af37a42a62fad7f49025894a',
  'graham-campbell/result-type' => 'v1.0.1@7e279d2cd5d7fbb156ce46daada972355cea27bb',
  'guzzlehttp/guzzle' => '7.1.0@7edeaa528fbb57123028bd5a76b9ce9540194e26',
  'guzzlehttp/promises' => 'v1.3.1@a59da6cf61d80060647ff4d3eb2c03a2bc694646',
  'guzzlehttp/psr7' => '1.6.1@239400de7a173fe9901b9ac7c06497751f00727a',
  'intervention/image' => '2.5.1@abbf18d5ab8367f96b3205ca3c89fb2fa598c69e',
  'jaybizzle/crawler-detect' => 'v1.2.99@0ffea34489b258a2709bfe93a9553e1efa5d1904',
  'jenssegers/agent' => 'v2.6.4@daa11c43729510b3700bc34d414664966b03bffe',
  'kalnoy/nestedset' => 'v5.0.2@1edd06d0744251940240f28021de7651d7fa71d3',
  'laminas/laminas-diactoros' => '2.4.1@36ef09b73e884135d2059cc498c938e90821bb57',
  'laminas/laminas-zendframework-bridge' => '1.1.1@6ede70583e101030bcace4dcddd648f760ddf642',
  'laravel/fortify' => 'v1.4.3@91518afbf3ce33d3e6b2a36b032e67e8474367e9',
  'laravel/framework' => 'v8.5.0@5a748eecae35fd453e0b1e4d4b6f4fadf0d3e7ac',
  'laravel/jetstream' => 'v1.2.1@9dd74e79fe09c570eb7a6bb4f00eac2c0dc3ed5f',
  'laravel/sanctum' => 'v2.6.0@a38ffd5f419dbaaefc4cb81c1bdde12a02c4854e',
  'laravel/tinker' => 'v2.4.2@58424c24e8aec31c3a3ac54eb3adb15e8a0a067b',
  'lcobucci/jwt' => '3.3.3@c1123697f6a2ec29162b82f170dd4a491f524773',
  'league/commonmark' => '1.5.5@45832dfed6007b984c0d40addfac48d403dc6432',
  'league/flysystem' => '1.1.3@9be3b16c877d477357c015cec057548cf9b2a14a',
  'league/mime-type-detection' => '1.5.0@ea2fbfc988bade315acd5967e6d02274086d0f28',
  'livewire/livewire' => 'v2.2.5@ffaa43e02e9b9ae56c8ae16a438b48844f6e9147',
  'mobiledetect/mobiledetectlib' => '2.8.34@6f8113f57a508494ca36acbcfa2dc2d923c7ed5b',
  'monolog/monolog' => '2.1.1@f9eee5cec93dfb313a38b6b288741e84e53f02d5',
  'nesbot/carbon' => '2.40.0@6c7646154181013ecd55e80c201b9fd873c6ee5d',
  'nexmo/client' => '2.4.0@9d515f6592d466159f79dde460ce2b99b8128279',
  'nexmo/client-core' => '2.4.0@9c6147dc97290373d203a7ca45c1299a68278895',
  'nexmo/laravel' => '2.3.0@f79bd96afa0e8347c2643bd5dfbc3df6a801cc6d',
  'nikic/php-parser' => 'v4.10.0@1c13d05035deff45f1230ca68bd7d74d621762d9',
  'ocramius/package-versions' => '1.9.0@94c9d42a466c57f91390cdd49c81313264f49d85',
  'opis/closure' => '3.5.7@4531e53afe2fc660403e76fb7644e95998bff7bf',
  'paragonie/constant_time_encoding' => 'v2.3.0@47a1cedd2e4d52688eb8c96469c05ebc8fd28fa2',
  'paragonie/random_compat' => 'v9.99.99@84b4dfb120c6f9b4ff7b3685f9b8f1aa365a0c95',
  'phpoption/phpoption' => '1.7.5@994ecccd8f3283ecf5ac33254543eb0ac946d525',
  'pragmarx/google2fa' => '8.0.0@26c4c5cf30a2844ba121760fd7301f8ad240100b',
  'psr/container' => '1.0.0@b7ce3b176482dbbc1245ebf52b181af44c2cf55f',
  'psr/event-dispatcher' => '1.0.0@dbefd12671e8a14ec7f180cab83036ed26714bb0',
  'psr/http-client' => '1.0.1@2dfb5f6c5eff0e91e20e913f8c5452ed95b86621',
  'psr/http-factory' => '1.0.1@12ac7fcd07e5b077433f5f2bee95b3a771bf61be',
  'psr/http-message' => '1.0.1@f6561bf28d520154e4b0ec72be95418abe6d9363',
  'psr/log' => '1.1.3@0f73288fd15629204f9d42b7055f72dacbe811fc',
  'psr/simple-cache' => '1.0.1@408d5eafb83c57f6365a3ca330ff23aa4a5fa39b',
  'psy/psysh' => 'v0.10.4@a8aec1b2981ab66882a01cce36a49b6317dc3560',
  'ralouphie/getallheaders' => '3.0.3@120b605dfeb996808c31b6477290a714d356e822',
  'ramsey/collection' => '1.1.1@24d93aefb2cd786b7edd9f45b554aea20b28b9b1',
  'ramsey/uuid' => '4.1.1@cd4032040a750077205918c86049aa0f43d22947',
  'realrashid/sweet-alert' => 'v3.1.7@94415e288bf38e482cc645030800c0a8591c9624',
  'srmklive/paypal' => '1.8.0@0c2ae237577f62396d474674cb40f82825a41ffb',
  'swiftmailer/swiftmailer' => 'v6.2.3@149cfdf118b169f7840bbe3ef0d4bc795d1780c9',
  'symfony/console' => 'v5.1.5@186f395b256065ba9b890c0a4e48a91d598fa2cf',
  'symfony/css-selector' => 'v5.1.5@e544e24472d4c97b2d11ade7caacd446727c6bf9',
  'symfony/deprecation-contracts' => 'v2.2.0@5fa56b4074d1ae755beb55617ddafe6f5d78f665',
  'symfony/error-handler' => 'v5.1.5@525636d4b84e06c6ca72d96b6856b5b169416e6a',
  'symfony/event-dispatcher' => 'v5.1.5@94871fc0a69c3c5da57764187724cdce0755899c',
  'symfony/event-dispatcher-contracts' => 'v2.2.0@0ba7d54483095a198fa51781bc608d17e84dffa2',
  'symfony/finder' => 'v5.1.5@2b765f0cf6612b3636e738c0689b29aa63088d5d',
  'symfony/http-foundation' => 'v5.1.5@41a4647f12870e9d41d9a7d72ff0614a27208558',
  'symfony/http-kernel' => 'v5.1.5@3e32676e6cb5d2081c91a56783471ff8a7f7110b',
  'symfony/mime' => 'v5.1.5@89a2c9b4cb7b5aa516cf55f5194c384f444c81dc',
  'symfony/polyfill-ctype' => 'v1.18.1@1c302646f6efc070cd46856e600e5e0684d6b454',
  'symfony/polyfill-iconv' => 'v1.18.1@6c2f78eb8f5ab8eaea98f6d414a5915f2e0fce36',
  'symfony/polyfill-intl-grapheme' => 'v1.18.1@b740103edbdcc39602239ee8860f0f45a8eb9aa5',
  'symfony/polyfill-intl-idn' => 'v1.18.1@5dcab1bc7146cf8c1beaa4502a3d9be344334251',
  'symfony/polyfill-intl-normalizer' => 'v1.18.1@37078a8dd4a2a1e9ab0231af7c6cb671b2ed5a7e',
  'symfony/polyfill-mbstring' => 'v1.18.1@a6977d63bf9a0ad4c65cd352709e230876f9904a',
  'symfony/polyfill-php70' => 'v1.18.1@0dd93f2c578bdc9c72697eaa5f1dd25644e618d3',
  'symfony/polyfill-php72' => 'v1.18.1@639447d008615574653fb3bc60d1986d7172eaae',
  'symfony/polyfill-php73' => 'v1.18.1@fffa1a52a023e782cdcc221d781fe1ec8f87fcca',
  'symfony/polyfill-php80' => 'v1.18.1@d87d5766cbf48d72388a9f6b85f280c8ad51f981',
  'symfony/process' => 'v5.1.5@1864216226af21eb76d9477f691e7cbf198e0402',
  'symfony/routing' => 'v5.1.5@47b0218344cb6af25c93ca8ee1137fafbee5005d',
  'symfony/service-contracts' => 'v2.2.0@d15da7ba4957ffb8f1747218be9e1a121fd298a1',
  'symfony/string' => 'v5.1.5@0de4cc1e18bb596226c06a82e2e7e9bc6001a63a',
  'symfony/translation' => 'v5.1.5@917b02cdc5f33e0309b8e9d33ee1480b20687413',
  'symfony/translation-contracts' => 'v2.2.0@77ce1c3627c9f39643acd9af086631f842c50c4d',
  'symfony/var-dumper' => 'v5.1.5@b43a3905262bcf97b2510f0621f859ca4f5287be',
  'tijsverkoyen/css-to-inline-styles' => '2.2.3@b43b05cf43c1b6d849478965062b6ef73e223bb5',
  'vlucas/phpdotenv' => 'v5.2.0@fba64139db67123c7a57072e5f8d3db10d160b66',
  'voku/portable-ascii' => '1.5.3@25bcbf01678930251fd572891447d9e318a6e2b8',
  'vonage/nexmo-bridge' => '0.1.0@62653b1165f4401580ca8d2b859f59c968de3711',
  'doctrine/instantiator' => '1.3.1@f350df0268e904597e3bd9c4685c53e0e333feea',
  'facade/flare-client-php' => '1.3.6@451fadf38e9f635e7f8e1f5b3cf5c9eb82f11799',
  'facade/ignition' => '2.3.7@b364db8860a63c1fb58b72b9718863c21df08762',
  'facade/ignition-contracts' => '1.0.1@aeab1ce8b68b188a43e81758e750151ad7da796b',
  'filp/whoops' => '2.7.3@5d5fe9bb3d656b514d455645b3addc5f7ba7714d',
  'fzaninotto/faker' => 'v1.9.1@fc10d778e4b84d5bd315dad194661e091d307c6f',
  'hamcrest/hamcrest-php' => 'v2.0.1@8c3d0a3f6af734494ad8f6fbbee0ba92422859f3',
  'mockery/mockery' => '1.4.2@20cab678faed06fac225193be281ea0fddb43b93',
  'myclabs/deep-copy' => '1.10.1@969b211f9a51aa1f6c01d1d2aef56d3bd91598e5',
  'nunomaduro/collision' => 'v5.0.2@4a343299054e9368d0db4a982a780cc4ffa12707',
  'phar-io/manifest' => '2.0.1@85265efd3af7ba3ca4b2a2c34dbfc5788dd29133',
  'phar-io/version' => '3.0.2@c6bb6825def89e0a32220f88337f8ceaf1975fa0',
  'phpdocumentor/reflection-common' => '2.2.0@1d01c49d4ed62f25aa84a747ad35d5a16924662b',
  'phpdocumentor/reflection-docblock' => '5.2.2@069a785b2141f5bcf49f3e353548dc1cce6df556',
  'phpdocumentor/type-resolver' => '1.4.0@6a467b8989322d92aa1c8bf2bebcc6e5c2ba55c0',
  'phpspec/prophecy' => '1.11.1@b20034be5efcdab4fb60ca3a29cba2949aead160',
  'phpunit/php-code-coverage' => '9.1.11@c9394cb9d07ecfa9351b96f2e296bad473195f4d',
  'phpunit/php-file-iterator' => '3.0.4@25fefc5b19835ca653877fe081644a3f8c1d915e',
  'phpunit/php-invoker' => '3.1.0@7a85b66acc48cacffdf87dadd3694e7123674298',
  'phpunit/php-text-template' => '2.0.2@6ff9c8ea4d3212b88fcf74e25e516e2c51c99324',
  'phpunit/php-timer' => '5.0.1@cc49734779cbb302bf51a44297dab8c4bbf941e7',
  'phpunit/phpunit' => '9.3.10@919333f2d046a89f9238f15d09f17a8f0baa5cc2',
  'scrivo/highlight.php' => 'v9.18.1.2@efb6e445494a9458aa59b0af5edfa4bdcc6809d9',
  'sebastian/cli-parser' => '1.0.0@2a4a38c56e62f7295bedb8b1b7439ad523d4ea82',
  'sebastian/code-unit' => '1.0.5@c1e2df332c905079980b119c4db103117e5e5c90',
  'sebastian/code-unit-reverse-lookup' => '2.0.2@ee51f9bb0c6d8a43337055db3120829fa14da819',
  'sebastian/comparator' => '4.0.3@dcc580eadfaa4e7f9d2cf9ae1922134ea962e14f',
  'sebastian/complexity' => '2.0.0@33fcd6a26656c6546f70871244ecba4b4dced097',
  'sebastian/diff' => '4.0.2@1e90b4cf905a7d06c420b1d2e9d11a4dc8a13113',
  'sebastian/environment' => '5.1.2@0a757cab9d5b7ef49a619f1143e6c9c1bc0fe9d2',
  'sebastian/exporter' => '4.0.2@571d721db4aec847a0e59690b954af33ebf9f023',
  'sebastian/global-state' => '5.0.0@22ae663c951bdc39da96603edc3239ed3a299097',
  'sebastian/lines-of-code' => '1.0.0@e02bf626f404b5daec382a7b8a6a4456e49017e5',
  'sebastian/object-enumerator' => '4.0.2@074fed2d0a6d08e1677dd8ce9d32aecb384917b8',
  'sebastian/object-reflector' => '2.0.2@127a46f6b057441b201253526f81d5406d6c7840',
  'sebastian/recursion-context' => '4.0.2@062231bf61d2b9448c4fa5a7643b5e1829c11d63',
  'sebastian/resource-operations' => '3.0.2@0653718a5a629b065e91f774595267f8dc32e213',
  'sebastian/type' => '2.2.1@86991e2b33446cd96e648c18bcdb1e95afb2c05a',
  'sebastian/version' => '3.0.1@626586115d0ed31cb71483be55beb759b5af5a3c',
  'theseer/tokenizer' => '1.2.0@75a63c33a8577608444246075ea0af0d052e452a',
  'webmozart/assert' => '1.9.1@bafc69caeb4d49c39fd0779086c03a3738cbb389',
  'laravel/laravel' => 'dev-master@efacd97fc541f989f41cfca9582c5fb97375c3b4',
);

    private function __construct()
    {
    }

    /**
     * @throws OutOfBoundsException If a version cannot be located.
     *
     * @psalm-param key-of<self::VERSIONS> $packageName
     * @psalm-pure
     */
    public static function getVersion(string $packageName) : string
    {
        if (isset(self::VERSIONS[$packageName])) {
            return self::VERSIONS[$packageName];
        }

        throw new OutOfBoundsException(
            'Required package "' . $packageName . '" is not installed: check your ./vendor/composer/installed.json and/or ./composer.lock files'
        );
    }
}
