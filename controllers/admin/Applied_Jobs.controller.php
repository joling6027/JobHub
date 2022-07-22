<?php


require_once('../../inc/config.inc.php');
require_once('../../views/component/footer.page.php');
require_once('../../views/component/header.page.php');
require_once('../../views/admin/Applied_Jobs.page.php');
require_once('../../inc/Utilities/PDOService.php');
require_once('../../inc/Utilities/UsersDAO.class.php');
require_once('../../models/Users.class.php');

UsersDAO::initialize(USERS);
$users = UsersDAO::getUsersAppliedJob();

if(!empty($_POST))
{

}


PageHeader::header(true);
PageJobApplied::userAppliedJobs($users);
PageJobApplied::editJobs();
PageFooter::footer(true);
