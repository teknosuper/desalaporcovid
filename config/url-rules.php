<?php 

switch ($_SERVER['SERVER_NAME']) {
    case 'desalaporcovid.online':
            $urlRules  = [
                '<url:.+/>' => 'site/redirect',

            ];
        # code...
        break;
	
	default:
            $urlRules  = [
                '<url:.+/>' => 'site/redirect',
            ];
		# code...
		break;
}

return $urlRules;
