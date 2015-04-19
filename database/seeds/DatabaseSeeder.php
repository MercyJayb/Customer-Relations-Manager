<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('LevelsTableSeeder');
		$this->call('DomainsTableSeeder');
        //$this->call('TasksTableSeeder');
	}

}

/*class TaskstableSeeder extends Seeder {
    public function run()
    {
        DB::table('tasks')->truncate();

        $table->string('title', 100);
        $table->text('description');
        $table->dateTime('start_at');
        $table->integer('frequency')->unsigned();
        $table->integer('status_id');
        $table->integer('priority_id');

        foreach(range(1,20) as $fake){
            $data = [
                'user_id'=>1,
                'title'=>$faker->sentense,
                'description' => $faker->paragraph,
                'frequency' => 30,
                'start_'
            ];
            CRM\Task::create($data);
        }


    }
}*/

class LevelsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('levels')->truncate();
        DB::table('users')->truncate();

		CRM\Level::create(['level_name'=>'Administrator']);
		CRM\Level::create(['level_name'=>'Technical Team User']);
		CRM\Level::create(['level_name'=>'Salesperson']);

        CRM\User::create([
            'username'  =>'richard',
            'firstname' => 'Richard',
            'lastname'  => 'Keep',
            'email'     => 'r.kipsang@gmail.com',
            'password'  =>  '+254721341661',
            'level_id'     => 1
        ]);

	}

}


class DomainsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('domains')->truncate();


        $query = "
INSERT INTO `domains` (`id`, `client_id`, `user_id`, `domain`, `ip`, `username`, `email`, `start_date`, `disk_partition`, `quota`, `disk_space_used`, `package`, `theme`, `owner`, `server`, `unix_start_date`, `disk_space_used_bytes`, `quota_bytes`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 'abcchildrensaidkenya.or.ke', '199.188.200.187', 'abcchildrensaidk', 'info@abcchildrensaidkenya.or.ke', '2015-03-24 02:26:00', 'home', '1000', '', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1427178389', '204', '1024000\r', NULL, '2015-04-05 21:05:52', '2015-04-05 21:05:52'),
(2, 0, 0, 'abckenya.or.ke', '199.188.200.187', 'abckenyaor', 'info@abckenya.or.ke', '2015-03-24 02:24:00', 'home', '1000', '', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1427178246', '268', '1024000\r', NULL, '2015-04-05 21:05:52', '2015-04-05 21:05:52'),
(3, 0, 0, 'adamsacres.co.ke', '199.188.200.187', 'adamsacr', 'adams@adamsacres.co.ke', '2013-08-19 08:55:00', 'home', '5000', '794', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1376916914', '813469', '5120000\r', NULL, '2015-04-05 21:05:52', '2015-04-05 21:05:52'),
(4, 0, 0, 'afapack.co.ke', '199.188.204.187', 'afapackc', 'info@afapack.co.ke', '2014-01-22 10:44:00', 'home', '1000', '23', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1390405443', '24116', '1024000\r', NULL, '2015-04-05 21:05:52', '2015-04-05 21:05:52'),
(5, 0, 0, 'afrodentsupplies.org', '199.188.200.187', 'afrodent', 'info@afrodentsupplies.org', '2013-05-11 03:40:00', 'home', '1000', '211', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1368258035', '216368', '1024000\r', NULL, '2015-04-05 21:05:52', '2015-04-05 21:05:52'),
(6, 0, 0, 'aib-africa.co.ke', '199.188.204.187', 'aibafricaco', 'info@aib-africa.co.ke', '2015-03-02 02:25:00', 'home', '1000', '1', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1425281154', '1664', '1024000\r', NULL, '2015-04-05 21:05:52', '2015-04-05 21:05:52'),
(7, 0, 0, 'alesta.co.ke', '199.188.204.186', 'alestaco', 'info@alesta.co.ke', '2014-02-27 04:06:00', 'home', '1000', '201', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1393491970', '206336', '1024000\r', NULL, '2015-04-05 21:05:52', '2015-04-05 21:05:52'),
(8, 0, 0, 'alliedlogistics.co.ke', '199.188.204.188', 'alliedlo', 'info@alliedlogistics.co.ke', '2014-02-04 07:18:00', 'home', '1000', '295', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1391516293', '302164', '1024000\r', NULL, '2015-04-05 21:05:52', '2015-04-05 21:05:52'),
(9, 0, 0, 'alphasafetyservices.org', '199.188.204.186', 'alphasaf', 'info@alphasafetyservices.org', '2013-09-09 10:42:00', 'home', '1000', '270', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1378737766', '276788', '1024000\r', NULL, '2015-04-05 21:05:52', '2015-04-05 21:05:52'),
(10, 0, 0, 'alrahman-agencies.com', '199.188.200.187', 'alrahman', 'info@alrahman-agencies.com', '2014-08-22 07:30:00', 'home', '1000', '560', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1408707042', '573824', '1024000\r', NULL, '2015-04-05 21:05:52', '2015-04-05 21:05:52'),
(11, 0, 0, 'authenticafricansafarisltd.com', '199.188.200.187', 'authenti', 'info@authenticafricansafarisltd.com', '2013-08-26 09:16:00', 'home', '1000', '51', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1377523010', '52436', '1024000\r', NULL, '2015-04-05 21:05:52', '2015-04-05 21:05:52'),
(12, 0, 0, 'authentiquewildsafaris.com', '199.188.204.187', 'authe', 'info@authentiquewildsafaris.com', '2013-11-01 03:38:00', 'home', '1000', '49', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1383291502', '50744', '1024000\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(13, 0, 0, 'autosalesfunnel.org', '199.188.200.187', 'autosale', 'info@autosalesfunnel.org', '2013-05-24 08:37:00', 'home', '5000', '642', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1369399074', '657946', '5120000\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(14, 0, 0, 'blackberrykenya.com', '199.188.204.187', 'blackber', 'info@blackberrykenya.com', '2013-05-03 08:09:00', 'home', '5000', '787', 'bluecosp_Blue Basic_blackber', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1367582949', '806628', '5120000\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(15, 0, 0, 'bluecloud.co.ke', '199.188.204.187', 'bluecloudco', 'info@bluecloud.co.ke', '2014-10-01 02:40:00', 'home', '80000', '2213', 'undefined', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1412145608', '2266788', '81920000\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(16, 0, 0, 'bookmart.co.ke', '199.188.204.187', 'bookma', 'info@bookmart.co.ke', '2013-04-02 13:30:00', 'home', '1000', '109', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1364923818', '112540', '1024000\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(17, 0, 0, 'calmu.ac.ke', '199.188.204.188', 'calmuac', 'info@calmu.ac.ke', '2013-01-24 09:26:00', 'home', '1000', '587', 'bluecosp_Blue Basic_calmuac_calmuac', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1359037572', '602011', '1024000\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(18, 0, 0, 'cmuonline.ac.ke', '199.188.204.187', 'cmuonlin', 'info@cmuonline.ac.ke', '2013-10-03 08:35:00', 'home', '1000', '648', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1380803708', '664136', '1024000\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(19, 0, 0, 'cromptonkenya.co.ke', '199.188.200.187', 'crompton', 'info@cromptonkenya.co.ke', '2014-05-13 06:34:00', 'home', '1000', '16', 'bluecosp_Blue Basic_peeceesc', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1399977251', '16812', '1024000\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(20, 0, 0, 'danielsoutlets.com', '199.188.200.187', 'danielsoutlets', 'info@danielsoutlets.com', '2014-12-21 02:11:00', 'home', '1000', '56', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1419145899', '57652', '1024000\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(21, 0, 0, 'dynamicconsult-ss.com', '199.188.200.187', 'dynamicc', 'info@dynamicconsult-ss.com', '2013-11-19 07:32:00', 'home', '2000', '1217', 'bluecosp_Blue Basic_dynamicc', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1384864334', '1247172', '2048000\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(22, 0, 0, 'eaa-s.jp', '199.188.204.187', 'eaasjpnew', 'info@eaa-s.jp', '2014-10-18 02:56:00', 'home', '5000', '947', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1413615371', '970600', '5120000\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(23, 0, 0, 'ecentive.co.ke', '199.188.204.186', 'ecentive', 'info@ecentive.co.ke', '2012-12-04 09:33:00', 'home', '1000', '1', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1354631589', '1152', '1024000\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(24, 0, 0, 'eco-adventures.co.ke', '199.188.200.187', 'ecoadventuresco', 'info@eco-adventures.co.ke', '2015-03-24 14:27:00', 'home', '1000', '292', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1427221621', '299020', '1024000\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(25, 0, 0, 'educonnect.co.ke', '199.188.204.187', 'educonne', 'info@educonnect.co.ke', '2013-03-26 07:32:00', 'home', '2000', '1546', 'bluecosp_Blue Basic', 'paper_lantern', 'bluecosp', 'host14.registrar-servers.com', '1364297569', '1583451', '2048000\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(26, 0, 0, 'edunet.co.ke', '199.188.204.188', 'edunetco', 'info@edunet.co.ke', '2014-02-13 07:51:00', 'home', '1000', '594', 'bluecosp_Blue Basic_edunetco', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1392295915', '608299', '1024000\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(27, 0, 0, 'elemech.co.ke', '199.188.204.186', 'elemechc', 'info@elemech.co.ke', '2014-04-10 07:07:00', 'home', '1000', '1', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1397128074', '1224', '1024000\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(28, 0, 0, 'elimusoft.org', '199.188.204.187', 'elimusof', 'info@elimusoft.org', '2012-12-13 06:16:00', 'home', '9000', '2904', 'undefined', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1355397391', '2973863', '9216000\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(29, 0, 0, 'enaijashop.com', '199.188.200.187', 'enaijash', 'info@enaijashop.com', '2013-12-17 08:54:00', 'home', '1000', '', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1387288448', '264', '1024000\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(30, 0, 0, 'errandsguru.com', '199.188.204.187', 'errandsg', 'info@errandsguru.com', '2013-02-11 09:35:00', 'home', '1000', '53', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1360593310', '54820', '1024000\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(31, 0, 0, 'esouthernltd.com', '199.188.204.187', 'esouther', 'info@esouthernltd.com', '2013-03-08 08:48:00', 'home', 'unlimited', '16', 'default', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1362750511', '16724', '\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(32, 0, 0, 'excellarcreative.com', '199.188.204.188', 'excellar', 'info@excellarcreative.com', '2013-10-07 09:08:00', 'home', '1000', '19', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1381151308', '20104', '1024000\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(33, 0, 0, 'fragrancelounge-ea.com', '199.188.200.187', 'fragranceloungee', 'info@fragrancelounge-ea.com', '2014-11-28 04:48:00', 'home', '1000', '599', 'undefined', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1417168100', '614316', '1024000\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(34, 0, 0, 'giantquickteam.com', '199.188.200.187', 'giantquickteam', 'info@giantquickteam.com', '2014-12-15 04:44:00', 'home', '1000', '3', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1418636655', '3768', '1024000\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(35, 0, 0, 'gredasouthsudan.org', '199.188.204.186', 'gredasouthsudan', 'info@gredasouthsudan.org', '2014-11-05 03:18:00', 'home', '1000', '8', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1415175507', '8420', '1024000\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(36, 0, 0, 'hamoss.org', '199.188.200.187', 'hamoss', 'info@hamoss.org', '2014-05-19 03:43:00', 'home', '1000', '51', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1400485399', '52955', '1024000\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(37, 0, 0, 'healthpromotionkenya.org', '199.188.200.187', 'healthpr', 'info@healthpromotionkenya.org', '2014-09-09 07:17:00', 'home', '3000', '1620', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1410261470', '1659588', '3072000\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(38, 0, 0, 'highestgroup.com', '199.188.204.186', 'highestg', 'info@highestgroup.com', '2014-04-10 08:30:00', 'home', '1000', '65', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1397133011', '67348', '1024000\r', NULL, '2015-04-05 21:05:53', '2015-04-05 21:05:53'),
(39, 0, 0, 'hla-ss.com', '199.188.200.187', 'hlass', 'info@hla-ss.com', '2013-12-13 04:13:00', 'home', '1000', '8', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1386926027', '8784', '1024000\r', NULL, '2015-04-05 21:05:54', '2015-04-05 21:05:54'),
(40, 0, 0, 'jisambaze.co.ke', '199.188.204.188', 'jisambaz', 'info@JISAMBAZE.CO.KE', '2013-02-19 02:17:00', 'home', '1000', '305', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1361258265', '312916', '1024000\r', NULL, '2015-04-05 21:05:54', '2015-04-05 21:05:54'),
(41, 0, 0, 'jyauditorsandconsult.com', '199.188.200.187', 'jyaudito', 'info@jyauditorsandconsult.com', '2014-05-08 04:52:00', 'home', '1000', '68', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1399539131', '70016', '1024000\r', NULL, '2015-04-05 21:05:54', '2015-04-05 21:05:54'),
(42, 0, 0, 'komaproperties.co.ke', '199.188.200.187', 'komapropertiesco', 'info@komaproperties.co.ke', '2014-12-15 03:06:00', 'home', '1000', '243', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1418630799', '249472', '1024000\r', NULL, '2015-04-05 21:05:54', '2015-04-05 21:05:54'),
(43, 0, 0, 'kusa.co.ke', '199.188.204.188', 'kusaco', 'info@kusa.co.ke', '2013-07-04 09:34:00', 'home', '1000', '', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1372944868', '408', '1024000\r', NULL, '2015-04-05 21:05:54', '2015-04-05 21:05:54'),
(44, 0, 0, 'kwandege.co.ke', '199.188.204.186', 'kwandege', 'info@kwandege.co.ke', '2014-03-28 00:23:00', 'home', '1000', '14', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1395980603', '14968', '1024000\r', NULL, '2015-04-05 21:05:54', '2015-04-05 21:05:54'),
(45, 0, 0, 'lakebogoriasparesort.com', '199.188.204.187', 'lakebogo', 'info@lakebogoriasparesort.com', '2013-02-25 08:00:00', 'home', '7000', '2435', 'undefined', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1361797216', '2494008', '7168000\r', NULL, '2015-04-05 21:05:54', '2015-04-05 21:05:54'),
(46, 0, 0, 'ldmag.co.ke', '199.188.204.186', 'ldmagco', 'info@ldmag.co.ke', '2013-08-30 10:03:00', 'home', '5000', '371', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1377871387', '380546', '5120000\r', NULL, '2015-04-05 21:05:54', '2015-04-05 21:05:54'),
(47, 0, 0, 'liveonline.co.ke', '199.188.200.187', 'online', 'adams@bluewebsafrica.co.ke', '2011-12-07 04:53:00', 'home', '1000', '519', 'infokens_Bronze Hosting UNBRANDED', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1323251602', '531652', '1024000\r', NULL, '2015-04-05 21:05:54', '2015-04-05 21:05:54'),
(48, 0, 0, 'loansystem.org', '199.188.204.187', 'loansyst', 'info@loansystem.org', '2013-03-16 07:57:00', 'home', '1000', '705', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1363435050', '722728', '1024000\r', NULL, '2015-04-05 21:05:54', '2015-04-05 21:05:54'),
(49, 0, 0, 'malabakeyaconsultants.com', '199.188.204.188', 'malabake', 'info@malabakeyaconsultants.com', '2014-01-29 08:55:00', 'home', '5000', '2145', 'undefined', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1391003743', '2197400', '5120000\r', NULL, '2015-04-05 21:05:54', '2015-04-05 21:05:54'),
(50, 0, 0, 'martintailors-hongkong.com', '199.188.204.187', 'martintailorshon', 'info@martintailors-hongkong.com', '2015-02-27 11:05:00', 'home', '1000', '63', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1425053121', '64724', '1024000\r', NULL, '2015-04-05 21:05:54', '2015-04-05 21:05:54'),
(51, 0, 0, 'masaimaracamp.co.ke', '199.188.200.187', 'mas', 'info@masaimaracamp.co.ke', '2014-12-20 05:02:00', 'home', '1000', '35', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1419069773', '36424', '1024000\r', NULL, '2015-04-05 21:05:54', '2015-04-05 21:05:54'),
(52, 0, 0, 'masaimaracamp.com', '199.188.200.187', 'masaimar', 'info@masaimaracamp.com', '2013-08-26 09:18:00', 'home', '1000', '36', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1377523086', '36932', '1024000\r', NULL, '2015-04-05 21:05:54', '2015-04-05 21:05:54'),
(53, 0, 0, 'maziwasacco.org', '199.188.200.187', 'maziwasa', 'info@maziwasacco.org', '2013-05-11 03:41:00', 'home', '1000', '27', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1368258112', '28364', '1024000\r', NULL, '2015-04-05 21:05:54', '2015-04-05 21:05:54'),
(54, 0, 0, 'mfarijiafrika.com', '199.188.204.187', 'mfarijia', 'info@mfarijiafrika.com', '2012-12-20 08:47:00', 'home', '1000', '357', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1356011276', '365596', '1024000\r', NULL, '2015-04-05 21:05:54', '2015-04-05 21:05:54'),
(55, 0, 0, 'moest-ss.com', '199.188.204.187', 'moestss', 'info@moest-ss.com', '2015-03-13 13:45:00', 'home', '1000', '178', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1426268745', '182556', '1024000\r', NULL, '2015-04-05 21:05:54', '2015-04-05 21:05:54'),
(56, 0, 0, 'monacosecuritygroup.co.ke', '199.188.200.187', 'monacosecuritygr', 'info@monacosecuritygroup.co.ke', '2014-11-27 09:43:00', 'home', '1000', '143', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1417099423', '146460', '1024000\r', NULL, '2015-04-05 21:05:54', '2015-04-05 21:05:54'),
(57, 0, 0, 'mya1city.com', '199.188.200.187', 'mya1city', 'info@mya1city.com', '2013-08-27 07:09:00', 'home', '6200', '123', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1377601765', '126236', '6348800\r', NULL, '2015-04-05 21:05:54', '2015-04-05 21:05:54'),
(58, 0, 0, '\nextdoor.co.ke', '199.188.204.187', 'nextdoor', 'info@nextdoor.co.ke', '2014-01-22 10:55:00', 'home', '1000', '52', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1390406119', '54004', '1024000\r', NULL, '2015-04-05 21:05:54', '2015-04-05 21:05:54'),
(59, 0, 0, 'olowuaru.co.ke', '199.188.204.188', 'olowuaru', 'info@olowuaru.co.ke', '2014-04-28 23:56:00', 'home', '1000', '32', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1398743789', '32932', '1024000\r', NULL, '2015-04-05 21:05:54', '2015-04-05 21:05:54'),
(60, 0, 0, 'onenaijashop.com', '199.188.200.187', 'onenaija', 'info@onenaijashop.com', '2013-12-17 08:55:00', 'home', '1000', '', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1387288525', '264', '1024000\r', NULL, '2015-04-05 21:05:54', '2015-04-05 21:05:54'),
(61, 0, 0, 'onesureshop.com', '199.188.200.187', 'onesures', 'info@onesureshop.com', '2013-12-17 08:51:00', 'home', '1000', '', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1387288297', '264', '1024000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(62, 0, 0, 'pastorjaredforjoyvalley.org', '199.188.204.186', 'pastorja', 'info@pastorjaredforjoyvalley.org', '2014-02-19 08:41:00', 'home', '1000', '319', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1392817291', '327120', '1024000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(63, 0, 0, 'peecees.co.ke', '199.188.200.187', 'peeceesc', 'info@peecees.co.ke', '2013-07-22 08:52:00', 'home', '1000', '356', 'bluecosp_Blue Basic_peeceesc', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1374497553', '364878', '1024000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(64, 0, 0, 'pentakenyaltd.co.ke', '199.188.204.187', 'pentakenyaltdco', 'info@pentakenyaltd.co.ke', '2015-01-23 04:33:00', 'home', '1000', '449', 'bluecosp_Blue Basic_pentakenyaltdco', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1422005583', '460563', '1024000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(65, 0, 0, 'prideofeastafrica.co.ke', '199.188.200.187', 'prideofe', 'info@prideofeastafrica.co.ke', '2014-05-29 01:58:00', 'home', '1000', '199', 'bluecosp_Blue Basic_prideofe', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1401343092', '204648', '1024000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(66, 0, 0, 'princesshopefoundation.org', '199.188.204.188', 'princess', 'info@princesshopefoundation.org', '2013-01-24 09:06:00', 'home', '1000', '27', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1359036387', '27924', '1024000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(67, 0, 0, 'sakaja.co.ke', '199.188.204.187', 'sakajaco', 'info@sakaja.co.ke', '2014-01-22 10:21:00', 'home', '1000', '123', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1390404114', '126604', '1024000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(68, 0, 0, 'sealkenya.co.ke', '199.188.204.187', 'sealkeny', '', '2013-02-04 06:35:00', 'home', '1000', '10', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1359977749', '10388', '1024000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(69, 0, 0, 'secretingredients.co.ke', '199.188.204.187', 'secretingredient', 'info@secretingredients.co.ke', '2015-03-20 06:42:00', 'home', '1000', '', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1426848128', '556', '1024000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(70, 0, 0, 'shileliproperties.co.ke', '199.188.204.187', 'shilelip', 'info@shileliproperties.co.ke', '2014-01-19 03:08:00', 'home', '3000', '2075', 'bluecosp_Blue Basic_shilelip', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1390118897', '2125272', '3072000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(71, 0, 0, 'shokol-online.com', '199.188.204.186', 'shokolon', 'info@shokol-online.com', '2013-10-31 05:39:00', 'home', '1000', '14', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1383212393', '14440', '1024000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(72, 0, 0, 'shop1zone.com', '199.188.200.187', 'shop1zon', 'info@shop1zone.com', '2013-12-17 08:53:00', 'home', '1000', '', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1387288386', '264', '1024000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(73, 0, 0, 'sidaibrides.co.ke', '199.188.204.187', 'sidaibridesco', 'info@sidaibrides.co.ke', '2015-01-29 05:05:00', 'home', '1000', '104', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1422525918', '107232', '1024000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(74, 0, 0, 'sirhenrys.co.ke', '199.188.204.188', 'sirhenry', 'info@sirhenrys.co.ke', '2013-01-09 01:22:00', 'home', '1000', '14', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1357712540', '15160', '1024000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(75, 0, 0, 'smartphoneskenya.com', '199.188.204.187', 'smartpho', 'info@smartphoneskenya.com', '2013-02-21 03:02:00', 'home', '1000', '40', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1361433736', '41954', '1024000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(76, 0, 0, 'springsadventuresafaris.com', '199.188.204.187', 'springsa', 'info@springsadventuresafaris.com', '2012-12-20 08:57:00', 'home', '5000', '888', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1356011872', '909649', '5120000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(77, 0, 0, 'ssahara.org', '199.188.204.188', 'ssahara', 'info@ssahara.org', '2013-01-21 01:15:00', 'home', '1000', '24', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1358748926', '25588', '1024000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(78, 0, 0, 'suddservices.com', '199.188.200.187', 'suddserv', 'info@suddservices.com', '2014-05-29 10:02:00', 'home', '1000', '149', 'bluecosp_Blue Basic_suddserv', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1401372153', '153126', '1024000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(79, 0, 0, '	hegreatspeeches.co.ke', '199.188.204.186', 'thegreat', 'info@thegreatspeeches.co.ke', '2013-10-31 04:16:00', 'home', '1000', '533', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1383207403', '546512', '1024000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(80, 0, 0, '	heleadershipcrucible.org', '199.188.200.187', 'theleadershipcru', 'info@theleadershipcrucible.org', '2014-12-15 04:42:00', 'home', '1000', '42', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1418636545', '43028', '1024000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(81, 0, 0, '	heramp.co.ke', '199.188.204.187', 'therampc', 'info@theramp.co.ke', '2013-04-02 11:54:00', 'home', '1000', '18', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1364918098', '18892', '1024000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(82, 0, 0, '	ravellerslinkkenya.com', '199.188.204.187', 'travelle', 'info@travellerslinkkenya.com', '2012-12-13 03:05:00', 'home', '1000', '5', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1355385908', '5468', '1024000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(83, 0, 0, '	reasureafricasafaris.com', '199.188.200.187', 'treasure', 'info@treasureafricasafaris.com', '2013-07-27 06:35:00', 'home', '1000', '71', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1374921344', '73280', '1024000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(84, 0, 0, '	uaafrica.org', '199.188.204.188', 'tuaafric', 'info@tuaafrica.org', '2013-07-04 09:05:00', 'home', '1000', '22', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1372943105', '23184', '1024000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(85, 0, 0, '	ukullist.com', '199.188.204.187', 'tukullis', 'info@tukullist.com', '2014-07-24 02:45:00', 'home', '1000', '186', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1406184329', '190700', '1024000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(86, 0, 0, 'ulayainteriors.co.ke', '199.188.200.187', 'ulayaint', 'info@ulayainteriors.co.ke', '2014-01-09 00:51:00', 'home', '2000', '942', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1389246676', '965144', '2048000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(87, 0, 0, 'uraia.or.ke', '162.213.248.19', 'uraiaor', 'info@uraia.or.ke', '2013-06-13 05:17:00', 'home', '5000', '1442', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1371115079', '1476668', '5120000\r', NULL, '2015-04-05 21:05:55', '2015-04-05 21:05:55'),
(88, 0, 0, 'voyageafrique.co.ke', '199.188.204.186', 'voyageaf', 'info@voyageafrique.co.ke', '2014-03-12 09:45:00', 'home', '1000', '621', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1394631914', '636088', '1024000\r', NULL, '2015-04-05 21:05:56', '2015-04-05 21:05:56'),
(89, 0, 0, 'voyageunicabs.com', '199.188.204.186', 'voyageun', 'info@voyageunicabs.com', '2014-03-05 10:11:00', 'home', '1000', '1', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1394032284', '1092', '1024000\r', NULL, '2015-04-05 21:05:56', '2015-04-05 21:05:56'),
(90, 0, 0, 'water-engineering.co.ke', '199.188.204.186', 'watereng', 'info@water-engineering.co.ke', '2014-04-05 00:56:00', 'home', '1000', '594', 'bluecosp_Blue Basic_shilelip', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1396673809', '608716', '1024000\r', NULL, '2015-04-05 21:05:56', '2015-04-05 21:05:56'),
(91, 0, 0, 'wiltrueeducationalcentre.ac.ke', '199.188.204.187', 'wiltrueeducation', 'info@wiltrueeducationalcentre.ac.ke', '2015-03-04 00:21:00', 'home', '1000', '39', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1425446479', '40352', '1024000\r', NULL, '2015-04-05 21:05:56', '2015-04-05 21:05:56'),
(92, 0, 0, 'womenpluskenya.org', '199.188.204.188', 'womenplu', 'info@womenpluskenya.org', '2013-10-11 10:15:00', 'home', '1000', '38', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1381500940', '39824', '1024000\r', NULL, '2015-04-05 21:05:56', '2015-04-05 21:05:56'),
(93, 0, 0, 'worldfreight.co.ke', '199.188.200.187', 'worldfre', 'info@worldfreight.co.ke', '2013-11-21 01:50:00', 'home', '1000', '121', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1385016606', '124008', '1024000\r', NULL, '2015-04-05 21:05:56', '2015-04-05 21:05:56'),
(94, 0, 0, 'zubl.co.ke', '199.188.204.188', 'zublco', 'info@zubl.co.ke', '2013-06-26 07:44:00', 'home', '6000', '2118', 'bluecosp_Blue Basic_zublco', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1372247080', '2169555', '6144000\r', NULL, '2015-04-05 21:05:56', '2015-04-05 21:05:56'),
(95, 0, 0, 'zubl.co.ug', '199.188.204.186', 'zublug', 'info@zubl.co.ug', '2014-03-05 01:03:00', 'home', '5000', '1283', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1393999437', '1314512', '5120000\r', NULL, '2015-04-05 21:05:56', '2015-04-05 21:05:56'),
(96, 0, 0, 'zubl.org', '199.188.204.186', 'zublorg', 'info@zubl.org', '2014-03-03 06:12:00', 'home', '5000', '138', 'bluecosp_Blue Basic', 'x3', 'bluecosp', 'host14.registrar-servers.com', '1393845170', '141428', '5120000\r', NULL, '2015-04-05 21:05:56', '2015-04-05 21:05:56');
";


	    DB::connection()->getpdo()->exec($query);
		
	}

}

