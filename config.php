<?php
	$_Head_Title = 'DCER University';
	$_Head_Icon = './src/assets/imgs/icon/ducku.png';
	$_Head_Icon1 = '../assets/imgs/icon/ducku.png';
	$_Head_Icon2 = '../../assets/imgs/icon/ducku.png';

	/* 
		How to link your files around this repository? 
			use:
				include $_SERVER['DOCUMENT_ROOT'] . 'folder directory inside Enrollment-System-BS501';
		
		How to use configured links around this repository?
			use:
				include $_SERVER['DOCUMENT_ROOT'] . Custom_URL . 'filename';
		
		Custom_URL:
			Kindly Refer to this comment for custom url -- relativity to -- file structure
				$_SERVER['DOCUMENT_ROOT']:
	*/
					//ASSETS();
						// /src/assets/imgs/background/:
							if (!defined('BACKGROUND')) { define('BACKGROUND', '/src/assets/imgs/background/'); }
						// /src/assets/imgs/icon/:
							if (!defined('ICON')) { define('ICON', '/src/assets/imgs/icon/'); }
						// /src/assets/uploads/documents/:
							if (!defined('DOCUMENTS')) { define('DOCUMENTS', '/src/assets/uploads/documents/'); }
						// /src/assets/uploads/imgs/:
							if (!defined('IMGS')) { define('IMGS', '/src/assets/uploads/imgs/'); }
					//CSS();
						// /src/css/:
							$link_1 = '../';
							$link_2 = '../../';
							$link_3 = '../../../';
					//DATA();
						// /src/data/:
							if (!defined('DATA')) { define('DATA', '/src/data/'); }
					//DATABASE();
						// /src/database/:
							if (!defined('DATABASE')) { define('DATABASE', '/src/database/'); }
					//JS();
						// /src/js/:
							if (!defined('JS')) { define('JS', '/src/js/'); }
					//MODULES();
						// /src/modules/:
							if (!defined('MODULES')) { define('MODULES', '/src/modules/'); }
						// /src/modules/components/:
							if (!defined('COMPONENTS')) { define('COMPONENTS', '/src/modules/components/'); }
						// /src/modules/dashboard/:
							if (!defined('DASHBOARD')) { define('DASHBOARD', '/src/modules/dashboard/'); }
						// /src/modules/index/:
							if (!defined('INDEX')) { define('INDEX', '/src/modules/index/'); }
					//PROCESS(); use Require_Once
						// /src/process/:
							if (!defined('PROCESS')) { define('PROCESS', '/src/process/'); }