<?php
$mangaSlug = env('MANGA_SLUG', '漫画');

// can be edited
$mangaSingular = ucfirst($mangaSlug);
$mangaSingularFUC = ucfirst($mangaSlug); // first letter uppercase
$mangaPlural = ucfirst($mangaSlug);
$mangaPluralFUC = ucfirst($mangaSlug); // first letter uppercase

return [
    /********************************/
    /*****    Administration	*****/
    /********************************/

    /** Layout: Menu and header **/
    'admin.layout.site-name'                    => ':sitename - Administration',
    'admin.layout.user-profile'                 => '用户头像',
    'admin.layout.settings'                     => '设置',
    'admin.layout.logout'                       => '退出',
    'admin.layout.dashboard'                    => '仪表盘',
    'admin.layout.manage-manga'                 => "$mangaSingular",
    'admin.layout.manga-list'                   => "$mangaSingular 列表",
    'admin.layout.hotmanga'                     => "热 $mangaPlural",
    'admin.layout.categories'                   => '类别',
    'admin.layout.general'                      => '通用',
    'admin.layout.seo'                          => 'SEO',
    'admin.layout.themes'                       => '主题',

    /** Dashboard **/
    'admin.dashboard.hotmanga'                  => "Hot $mangaPlural",
    'admin.dashboard.edit-hotlist'              => '编辑排行榜列表',
    'admin.dashboard.hotlist-empty'             => 'The hot list is empty !',
    'admin.dashboard.latest-added-manga'        => "Latest added $mangaSingular",
    'admin.dashboard.create-manga'              => "新建 $mangaSingular",
    'admin.dashboard.view-all-manga'            => "View All $mangaPlural",
    'admin.dashboard.no-manga'                  => "There is no $mangaSingular!",
    'admin.dashboard.latest-added-chapter'      => '最新添加的章节',
    'admin.dashboard.no-chapter'                => 'There is no chapter !',

    /** Categories **/
    'admin.category.categories'            	=> '类别',
    'admin.category.name'                  	=> '类别名称',
    'admin.category.slug'                  	=> 'Slug',
    'admin.category.slug-placeholder'      	=> 'must be unique, without spaces',
    'admin.category.back'                  	=> '返回',
    'admin.category.create-category'       	=> '增加类别',
    'admin.category.update-category'       	=> '编辑类别',
    'admin.category.edit'                  	=> '编辑',
    'admin.category.delete'                	=> '删除',
    'admin.category.no-category'           	=> 'There is no category !',
    'admin.category.confirm-delete'           	=> '您确定删除此类别?',

    /** Manga **/
    'admin.manga.list'                     	=> "$mangaSingularFUC 列表",
    'admin.manga.create'                   	=> "创建新$mangaSingular",
    'admin.manga.actions'                  	=> 'Actions',
    'admin.manga.edit-manga'               	=> "Edit $mangaSingular",
    'admin.manga.delete-manga'             	=> "Delete $mangaSingular",
    'admin.manga.create-manga'             	=> "Create $mangaSingular",
    'admin.manga.back'                     	=> '返回',
    'admin.manga.confirm-delete'                => "Are you sure to delete this $mangaSingular and all chapters?",

    'admin.manga.detail.status'            	=> '状态:',
    'admin.manga.detail.other-names'       	=> '其他名字:',
    'admin.manga.detail.author'            	=> '作者(s):',
    'admin.manga.detail.released'          	=> '发布:',
    'admin.manga.detail.categories'        	=> '类别:',
    'admin.manga.detail.summary'           	=> 'Summary:',
    'admin.manga.detail.caution'           	=> 'Violent Content',

    'admin.manga.chapters'                 	=> ':manganame: Chapters',
    'admin.manga.create-chapter'           	=> '增加章节',
    'admin.manga.chapter-number'           	=> '#',
    'admin.manga.chapter-name'             	=> '章节名称',
    'admin.manga.created'                  	=> '创建',
    'admin.manga.owner'                         => 'Owner',

    'admin.manga.create.manga-name'        	=> "$mangaSingularFUC 名称",
    'admin.manga.create.manga-slug'        	=> 'Slug',
    'admin.manga.create.slug-placeholder'  	=> 'must be unique, without spaces',
    'admin.manga.create.comma-separated'   	=> '用逗号分开',
    'admin.manga.create.status'            	=> '状态',
    'admin.manga.create.other-names'       	=> '其他名字',
    'admin.manga.create.author'            	=> '作者(s)',
    'admin.manga.create.released'          	=> '发布日期',
    'admin.manga.create.categories'        	=> '类别',
    'admin.manga.create.categories-title'  	=> '选择一个或多个类别',
    'admin.manga.create.summary'           	=> 'Summary',
    'admin.manga.create.filename'           	=> 'filename:',
    'admin.manga.create.size'           	=> 'size:',
    'admin.manga.create.upload-cover'          	=> '上传封面',
    'admin.manga.create.remove-cover'          	=> '删除封面',

    'admin.manga.edit.title'                    => "Edit $mangaSingular",
    'admin.manga.edit.update-manga'             => "Update $mangaSingular",
    'admin.manga.edit'                          => '编辑',

    'admin.manga.hot.title'                     => "Create your Hot $mangaSingular list",
    'admin.manga.hot.notice'                    => 'Hot list is the list displayed with large thumbnail in the home page.',
    'admin.manga.hot.manga-list'                => "$mangaSingularFUC List",
    'admin.manga.hot.hot-list'                  => '排行榜',
    'admin.manga.hot.save'                      => '保存排行榜',

    /** Chapter **/
    'admin.chapter.create'                      => '新的章节',
    'admin.chapter.create.title'                => '增加章节',
    'admin.chapter.create.chapter-name'    	=> '章节名称',
    'admin.chapter.create.number'      		=> '序号',
    'admin.chapter.create.slug'        		=> 'Slug',
    'admin.chapter.create.slug-placeholder'	=> 'must be unique, without spaces',
    'admin.chapter.create.volume'               => 'Volume',
    'admin.chapter.back'          		=> '返回',
    'admin.chapter.create.create-chapter' 	=> '创建章节',

    'admin.chapter.edit'                        => 'Chapter #:number',
    'admin.chapter.edit.title' 			=> 'Edit chapter',
    'admin.chapter.edit.update-chapter' 	=> 'Update Chapter',
    'admin.chapter.edit.chapter-info' 		=> 'Chapter #:number: :name',
    'admin.chapter.edit.add-pages' 		=> 'Add Pages',
    'admin.chapter.edit.upload-zip' 		=> 'Upload Zip file',
    'admin.chapter.edit.upload-images' 		=> 'Upload Images',
    'admin.chapter.edit.grap-sites' 		=> 'Grab from other sites',
    'admin.chapter.edit.delete-chapter'		=> 'Delete chapter',
    'admin.chapter.edit.confirm-delete' 	=> 'Are you sure to delete this chapter?',
    'admin.chapter.edit.zip-error'	 	=> 'Please select the zip file that you want to upload, The Zip file must contain only images.',
    'admin.chapter.edit.upload'	 		=> 'Upload',
    'admin.chapter.edit.add-image-urls'	 	=> 'Enter one or many images URL (one per line)',
    'admin.chapter.edit.confirm-delete-page' 	=> 'Are you sure to delete this page?',
    'admin.chapter.edit.create-pages' 		=> 'Create pages',

    'admin.chapter.edit.page-number' 		=> '#',
    'admin.chapter.edit.page-scan' 		=> 'Scan',
    'admin.chapter.edit.page-filename' 		=> 'Filename',
    'admin.chapter.edit.page-slug' 		=> 'Slug',
    'admin.chapter.edit.page-action'  		=> 'Action',
    'admin.chapter.edit.delete-page'  		=> 'delete page',
    'admin.chapter.edit.no-page'  		=> 'There is no Scan !',
    'admin.chapter.edit.manually'               => 'Manually',

    'admin.chapter.page.title'  		=> 'Upload one or multiple images',
    'admin.chapter.page.back'  			=> 'Back to chapter',
    'admin.chapter.page.add-images'  		=> 'Add Images',
    'admin.chapter.page.upload-save'  		=> 'Start upload & Save',
    'admin.chapter.page.start'  		=> 'Start',
    'admin.chapter.page.delete'  		=> 'Delete',

    'admin.chapter.scraper.title'               => 'Grab Manga chapter from others websites',
    'admin.chapter.scraper.select-source'       => 'Select your Scan Manga source',
    'admin.chapter.scraper.chapter-url'         => 'Chapter URL',
    'admin.chapter.scraper.start'               => 'Start Scraping',
    'admin.chapter.scraper.header-number'       => '#',
    'admin.chapter.scraper.header-scan'         => 'Scan',
    'admin.chapter.scraper.header-name'         => 'Filename',
    'admin.chapter.scraper.header-url'          => 'URL',
    'admin.chapter.scraper.one-many-urls'       => 'Enter one or many chapters URL (one per line)',
    'admin.chapter.scraper.total-progress'      => 'Total Progress',

    /** Settings **/
    'admin.settings'				=> 'Settings',

    'admin.settings.general'			=> 'General',
    'admin.settings.general.header'		=> 'General informations about your site',
    'admin.settings.general.select-lang'	=> 'Change the language of your site:',
    'admin.settings.general.site-name'		=> 'Site Name:',
    'admin.settings.general.slogan'		=> 'Slogan:',
    'admin.settings.general.description'	=> 'Description:',
    'admin.settings.general.site-orientation'   => 'Select the site orientation',
    'admin.settings.general.orientation-rtl'    => 'Right-To-Left',
    'admin.settings.general.orientation-ltr'    => 'Left-To-Right',

    'admin.settings.seo'			=> 'SEO',
    'admin.settings.seo.header'			=> 'Search Engin Optimization',
    'admin.settings.seo.title'			=> 'Title:',
    'admin.settings.seo.keywords'		=> 'Keywords:',
    'admin.settings.seo.description'		=> 'Description:',
    'admin.settings.seo.ga-id'			=> 'Google Analytics ID:',
    'admin.settings.seo.gw-id'			=> 'Google Webmaster ID:',

    'admin.settings.profile'			=> 'User Profile',
    'admin.settings.profile.header'		=> 'User Profile',
    'admin.settings.profile.name'		=> 'Name:',
    'admin.settings.profile.username'		=> 'Username:',
    'admin.settings.profile.pwd'		=> 'Password:',
    'admin.settings.profile.email'		=> 'Email:',

    'admin.settings.theme'			=> 'Themes',
    'admin.settings.theme.header'		=> 'Themes',
    'admin.settings.theme.select-theme'		=> 'Select Main theme',
    'admin.settings.theme.select-theme-reader'  => 'Select Reader theme',

    // Manga options
    'admin.layout.options'                      => "$mangaSingularFUC Options",
    'admin.settings.manga.allow-duplicate-chapter'  => 'Allow duplicate chapters',
    'admin.settings.manga.allow-download-chapter'   => 'Allow downloading chapters from frontpage',
    'admin.settings.manga.show-contributer-pseudo'  => 'Show contributer on frontpage',

    // Ad placements
    'admin.settings.ads.manage-ads'             => 'Manage Ads',
    'admin.settings.ads.ad-blocks'              => 'Ad Blocks',
    'admin.settings.ads.ad-placements'          => 'Ad Placements',
    'admin.settings.ads.block'                  => 'Block: ',
    'admin.settings.ads.block-id'               => 'Block identifier',
    'admin.settings.ads.block-code'             => 'Your code here',
    'admin.settings.ads.add-block'              => 'Add new ad-bloc',
    'admin.settings.ads.reader-page'            => 'Reader Page',
    'admin.settings.ads.homepage'               => 'HomePage',
    'admin.settings.ads.info-page'              => "$mangaSingularFUC Info Page",
    'admin.settings.ads.save-all-placements'    => 'Save All Placements',

    'admin.settings.save'			=> 'Save',
    'admin.settings.update'			=> 'Update',

    /** Manage Users **/
    'admin.users.manage-users'                  => 'Manage Users',
    'admin.users.permissions'                   => 'Permissions',
    'admin.users.permission'                    => 'Permission',
    'admin.users.slug'				=> 'Slug',
    'admin.users.roles'                         => 'Roles',
    'admin.users.roles.role'                    => 'Role',
    'admin.users.roles.add'                     => 'Add new role',
    'admin.users.roles.edit'                    => 'Edit Role',
    'admin.users.roles.create'                  => 'Create Role',
    'admin.users.roles.role-name'               => 'Role name',
    'admin.users.roles.select-perms'            => 'Add permissions to your role:',
    'admin.users.roles.role-perms'              => 'Role permissions',

    'admin.users.users'                         => 'Users',
    'admin.users.email'                         => 'E-mail',
    'admin.users.username'                      => 'Username',
    'admin.users.status'                        => 'Status',
    'admin.users.roles'                         => 'Roles',
    'admin.users.manga'                         => "N° $mangaSingularFUC",
    'admin.users.chapters'                      => 'N° Chapters',
    'admin.users.add'                           => 'Add new user',
    'admin.users.create'                        => 'Create User',
    'admin.users.account-status'		=> 'Account status:',
    'admin.users.enabled'                       => 'Enabled',
    'admin.users.disabled'                      => 'Disabled',
    'admin.users.select-roles'                  => 'Add roles to the new user:',
    'admin.users.user-roles'                    => 'User roles',
    'admin.users.edit-user'                     => 'Edit User',

    'admin.users.roles.confirm-delete'          => 'Are you sure to delete this Role?',
    'admin.users.confirm-delete'                => 'Are you sure to delete this User? All his Contents will be assigned to Admin',

    'admin.users.edit'                          => 'edit',
    'admin.users.delete'                        => 'delete',

    'admin.users.user.create-success'           => 'User has been successfully created!',
    'admin.users.user.update-success'           => 'User has been successfully updated!',
    'admin.users.role.create-success'           => 'Role has been successfully created!',
    'admin.users.role.update-success'           => 'Role has been successfully updated!',

    'admin.users.options'                       => 'Subscription Options',
    'admin.users.options.new-account'           => 'For new created Account',
    'admin.users.options.admin-activate-it'     => 'New members needs to be confirmed by admin',
    'admin.users.options.send-confim-email'     => 'Send E-mail confirmation',
    'admin.users.options.default-role'          => 'Default Role',
    'admin.users.options.mail-conf'             => 'Mail configuration used by "forgot password" and "account creation" actions:',
    'admin.users.options.use-php-mail'          => 'Use PHP Mail (Enabled by most Hosting providers)',
    'admin.users.options.config-smtp'           => 'Configure SMTP server',
    'admin.users.options.host'                  => 'host',
    'admin.users.options.port'                  => 'port',
    'admin.users.options.username'              => 'username',
    'admin.users.options.password'              => 'password',
    'admin.users.options.address'               => 'Email address that will be displayed in the sent email',
    'admin.users.options.name'                  => 'The name that will be displayed in the sent email (e.g. Your website name)',
    'admin.users.options.allo-subscribe'        => 'Allow users to subscribe to my website',

    'admin.users.options.yes'                   => 'Yes',
    'admin.users.options.no'                    => 'No',

    /** Messages **/
    'admin.settings.update.success'		=> 'Settings has been successfully updated!',
    'admin.settings.update.profile-success'	=> 'Profile has been successfully updated!',

    'admin.category.create-success'             => 'Category has been successfully created!',
    'admin.category.update-success'             => 'Category has been successfully updated!',
    'admin.category.delete-success'             => 'Category has been successfully deleted!',

    'admin.chapter.update-success'              => 'Chapter has been successfully updated!',
    'admin.chapter.page.create-success'         => 'Pages has been successfully created!',
    'admin.chapter.page.select-zip-error'       => 'Please select a ZIP file.',
    'admin.chapter.page.select-file-error'      => 'Please select a file.',

    'admin.manga.create.choose-status'          => '选择状态',
    'admin.manga.hot.update-success'            => '列表中已成功更新!',

    /********************************/
    /*****      Frontpage       *****/
    /********************************/

    /** Menu **/
    'front.menu.home' 				=> 'Home',
    'front.menu.manga-list' 			=> "$mangaSingularFUC List",
    'front.menu.random-manga'                   => "Random $mangaSingularFUC",
    'front.menu.search'                         => 'Search...',
    'front.menu.bookmarks'                      => 'My Bookmark',

    /** Home **/
    'front.home.title' 				=> ':sitename | Home',
    'front.home.latest-manga' 			=> "Latest $mangaPluralFUC Updates",
    'front.home.hot' 				=> 'hot',
    'front.home.no-chapter'          		=> 'There is no chapter !',
    'front.home.hot-updates'          		=> "Hot $mangaPluralFUC Updates",
    'front.home.about-manga'          		=> "About $mangaSingularFUC",
    'front.home.read-chapter'          		=> 'Read chapter',
    'front.home.top-manga'          		=> 'Top $mangaPluralFUC',
    'front.home.top10'          		=> 'Top10',
    'front.home.subscribe'          		=> 'Subscribe',
    'front.home.login'          		=> 'Login',
    'front.home.hello-user'          		=> 'Hello :user',
    'front.home.logout'                         => 'Logout',
    'front.home.yesterday'                      => 'Yesterday',
    'front.home.today'                          => 'Today',

    /** Manga Directory **/
    'front.directory.title' 			=> ":sitename | $mangaPluralFUC Directory",
    'front.directory.sort-by'                   => 'Sort by:',
    'front.directory.az'                        => 'AZ',
    'front.directory.views'                     => 'Views',
    'front.directory.text-version'              => 'Text version',
    'front.directory.image-version'             => 'Image version',
    'front.directory.browse-category'           => "Browse $mangaPluralFUC by Category",
    'front.directory.browse-alphabetic' 	=> "Browse $mangaPluralFUC by Initial Alphabetic",
    'front.directory.manga-directory' 		=> "$mangaPluralFUC Directory",
    'front.directory.no-manga'                  => "There is no $mangaSingular!",

    /** Manga Info **/
    'front.manga.title'              		=> ":manganame $mangaSingularFUC",
    'front.manga.status'            		=> 'Status',
    'front.manga.other-names'       		=> 'Other names',
    'front.manga.author'            		=> 'Author(s)',
    'front.manga.released'          		=> 'Date of release',
    'front.manga.categories'        		=> 'Categories',
    'front.manga.summary'           		=> 'Summary',
    'front.manga.rating'                	=> 'Rating',
    'front.manga.chapters'             		=> ':manganame Chapters',
    'front.manga.no-chapter'            	=> 'There is no chapter !',
    'front.manga.note'                          => 'Average :avg/5 out of :votes total votes.',
    'front.manga.caution'            		=> "Caution: This $mangaSingular contain themes or scenes that may not be suitable for very young readers.",
    'front.manga.download'            		=> 'download',

    /** Reader **/
    'front.reader.page'                         => 'Page',
    'front.reader.chaptre'                      => 'Chapter',
    'front.reader.prev'                         => '←prev',
    'front.reader.next'                         => 'next→',
    'front.reader.tips'                         => 'Tips:',
    'front.reader.tips-message'                 => 'Click on the <em>:manga :chapter manga</em> image to go to the next page. You can use left and right keyboard keys to browse between pages.',
    'front.reader.first-page-message'           => 'You are already on the First Page.',
    'front.reader.last-page-message'            => 'This is the latest page.',
    'front.reader.no-page'                      => 'no page published yet !!!',
    'front.reader.other-chapter'                => 'Other chapters',
    'front.reader.reading-mode'                 => 'Reading mode',
    'front.reader.page-per-page'                => 'Page by Page',
    'front.reader.all-pages'                    => 'All in one page',

    /** Bookmark **/
    'front.bookmarks.title'                     => 'My Bookmarks',
    'front.bookmarks.currently-reading'         => 'Currently Reading',
    'front.bookmarks.completed'                 => 'Completed',
    'front.bookmarks.on-hold'                   => 'On Hold',
    'front.bookmarks.plan-to-read'              => 'Plan to Read',
    'front.bookmarks.all'                       => 'All',
    'front.bookmarks.different-status'          => 'Select a status different from the active one!',
    'front.bookmarks.select-manga'              => 'Select at least one manga!',
    'front.bookmarks.confirm-delete'            => 'Are you sure to delete this Bookmark?',
    'front.bookmarks.status-changed'            => 'Bookmark(s) successfully moved!',
    'front.bookmarks.error'                     => 'An error has occurred, please retry!',
    'front.bookmarks.move'                      => 'move',
    'front.bookmarks.no-bookmark'               => 'There is no Bookmark!',
    'front.bookmarks.bookmark-at'               => 'Bookmarked at',
    'front.bookmarks.bookmark'                  => 'Bookmark',
    'front.bookmarks.bookmarked'                => 'Bookmark added!',

    /***** v1.7 *****/
    /** Admin **/
    'admin.manga.create.artist'                 => 'Artist(s)',
    'admin.layout.comic-types'                  => '漫画类型',
    'admin.comictype.types'                     => '漫画类型',
    'admin.comictype.label'                     => '标签',
    'admin.comictype.no-type'                   => 'There is no comic type!',
    'admin.comictype.create-type'               => '创建类型',
    'admin.comictype.edit'                      => 'edit',
    'admin.comictype.delete'                    => 'delete',
    'admin.comictype.update-type'               => 'Update type',
    'admin.comictype.confirm-delete'            => 'Are you sure you want to delete this type?',
    'admin.comictype.create-success'            => 'Comic type has been successfully created!',
    'admin.comictype.update-success'            => 'Comic type has been successfully updated!',
    'admin.comictype.delete-success'            => 'Comic type has been successfully deleted!',

    'admin.settings.info'                       => 'Site info',
    'admin.settings.pagination'                 => 'Pagination',
    'admin.settings.general.pagination-homepage'        => 'Homepage: Latest chapters',
    'admin.settings.general.pagination-mangalist'       => "Page: $mangaPluralFUC List",
    'admin.settings.general.pagination-latest-release'  => 'Page: Latest release',
    'admin.settings.general.pagination-news-homepage'   => 'Hompage: Latest news',
    'admin.settings.general.pagination-newslist'        => 'Page: Latest news',
    'admin.settings.menu'                       => 'Menu',
    'admin.settings.menu.show-home-menu'        => 'Home',
    'admin.settings.menu.show-mangalist-menu'   => "$mangaPluralFUC List",
    'admin.settings.menu.show-latest-release-menu'     => 'Latest release',
    'admin.settings.menu.show-news-menu'        => 'News',
    'admin.settings.menu.show-random-menu'      => 'Random',
    'admin.settings.menu.add-custom-url'        => 'Add custom URL',
    'admin.settings.comment'                    => 'Comments',
    'admin.settings.comment.system'             => 'Comment system:',
    'admin.settings.comment.show-on-page'       => 'Add comments on page:',
    'admin.settings.comment.news-page'          => 'News',
    'admin.settings.comment.manga-page'         => "$mangaSingularFUC info page",
    'admin.settings.comment.reader-page'        => 'Reader',
    'admin.settings.reader'                     => 'Reader',
    'admin.settings.general.reader-type'        => 'Reader type',
    'admin.settings.general.reader-type-all'    => 'All in one page',
    'admin.settings.general.reader-type-ppp'    => 'Page per page',
    'admin.settings.manga.show-chapters-volume' => 'Show chapters by volume',
    'admin.chapter.scraper.notif-users'         => 'Notify Users',
    'admin.chapter.scraper.notif-users-message' => 'A notification, indicating that new chapters were added, will be sent to users with this manga as favorite?',
    'admin.chapter.scraper.notif-users.notify'  => 'Notify',

    /** Front **/
    'front.manga.artist'                        => 'Artist(s)',
    'front.manga.type'                          => 'Type',
    'front.home.no-news'                        => 'There is no news',
    'front.home.news'				=> 'News',
    'front.home.latest-release'			=> 'Latest release',
    'front.home.dashboard'          		=> 'Dashboard',
    'front.myprofil.add-manga-chapter'		=> "Add $mangaSingularFUC/Chapter",
    'front.myprofil.add-post'          		=> 'Add post',
    'front.myprofil.bookmarks-notification'	=> 'Send me notifications when a new chapter is published',
    'front.reader.report-broken-image'          => 'report broken image',
    'front.reader.email'                        => 'email',
    'front.reader.message'                      => 'message',
    'front.reader.send'                         => 'send',
    'front.reader.close'                        => 'close',
    'front.reader.image-broken'                 => ':image broken, reported by :email',
    'front.reader.sentSuccess'                  => 'Message sent!',
    'front.home.rss-feed'                       => 'RSS feed',
    'front.home.contact-us'                     => 'Contact us',
    'front.home.contact.sentSuccess'            => 'Your message was sent successfully.',
    'front.home.contact.info'                   => 'Want to get in touch with us? Fill out the form below to send us a message and we will try to get back to you ASAP!',
    'front.home.contact.name'                   => 'Name',
    'front.home.contact.email'                  => 'Email',
    'front.home.contact.subject'                => 'Subject',
    'front.home.contact.send'                   => 'send',
    'front.home.contact.from'                   => 'Email from :name',

    // email notif
    'email.notif.greetings'                     => 'Hello :name',
    'email.notif.body'                          => 'We want to let you know that :manga chapter :chapter is now available at:',
    'email.notif.body.bulk-update'              => 'We want to let you know that new chapter(s) of :manga are added at:',
    'email.notif.best-regards'                  => 'Best regards',

    /***** v1.8 *****/
    /** Admin **/
    'admin.settings.menu.show-adv-search-menu'  => 'Advanced Search',
    'admin.settings.seo.global'                 => 'Global',
    'admin.settings.seo.advanced'               => 'Advanced',
    'admin.settings.seo.use-global'             => ' use global',
    'admin.settings.seo.desc-info'              => ' extract first 250 chars',
    'admin.settings.seo.desc-info-max'          => ' 250 chars max',
    'admin.settings.seo.info-page'              => "$mangaSingularFUC Info Page",
    'admin.settings.seo.reader-page'            => 'Reader Page',
    'admin.settings.seo.news-page'              => 'News Page',
    'admin.settings.seo.mangalist-page'         => "$mangaPluralFUC List Page",
    'admin.settings.seo.latestnews-page'        => 'Latest News Page',
    'admin.settings.seo.latestrelease-page'     => 'Latest Release Page',
    'admin.settings.seo.available-vars'         => 'Available variables to use in the meta and titles:',
    'admin.settings.seo.available-vars.reader'  => 'Variables to use in the reader, in addition to variables above:',
    'admin.settings.seo.available-vars.news'    => 'Available variables to use in the meta and titles:',

    'admin.settings.widgets'                    => 'Widgets',
    'admin.settings.widgets.select-widgets'     => '-- Select widgets to show in the frontpage --',
    'admin.settings.widgets.site_description'   => 'Site Description',
    'admin.settings.widgets.social_buttons'     => 'Social Buttons',
    'admin.settings.widgets.top_rates'          => 'Top by rates',
    'admin.settings.widgets.top_views'          => 'Top by views',
    'admin.settings.widgets.custom_code'        => 'Custom/HTML code',
    'admin.settings.widgets.add-widget'         => 'add widget',
    'admin.settings.widgets.site_description.header'=> 'Site Description (editable in "General Settings")',
    'admin.settings.widgets.social_buttons.header'  => 'Social Buttons (Facebook / Google+ / Twitter Counters)',
    'admin.settings.widgets.top_rates.header'   => 'Top Rating',
    'admin.settings.widgets.top_views.header'   => 'Top Views',
    'admin.settings.widgets.custom_code.header' => 'Custom/HTML code',

    'admin.settings.cache'                      => 'Cache',
    'admin.settings.cache.reader'               => 'Reader/Chapters Cache',
    'admin.settings.cache.reader.help'          => "Set the number of minutes to cache $mangaSingularFUC Chapter. 0 means don't cache",
    'admin.settings.cache.clear'                => 'Clear Cache',
    'admin.settings.cache.cleared'              => 'Cache cleared!',
    'admin.settings.downloads.clear'            => 'Clear generat. ZIP for downloads',
    'admin.settings.downloads.cleared'          => 'Downloads cleared!',


    /** Front **/
    'front.adv-search.title' 			=> ':sitename | Advanced Search',
    'front.home.adv-search'                     => 'Advanced Search',
    'front.adv-search.filtre-cat'               => 'Filter by categories',
    'front.adv-search.filtre-cat.ph'            => 'Select one or many categories',
    'front.adv-search.filtre-stat'              => 'Filter by status',
    'front.adv-search.filtre-stat.ph'           => 'Select one or many status',
    'front.adv-search.filtre-type'              => 'Filter by types',
    'front.adv-search.filtre-type.ph'           => 'Select one or many types',
    'front.adv-search.filtre-year'              => 'Filter by year of release',
    'front.adv-search.filtre-year.ph'           => 'enter the year of release',
    'front.adv-search.filtre-author'            => 'Filter by author',
    'front.adv-search.filtre-author.ph'         => 'enter the author name',
    'front.adv-search.search'                   => 'search',
    'front.adv-search.search-result'            => 'Search Result',
    'front.myprofil.my-profil'              	=> 'My Profile',
    'front.myprofil.edit-my-profil'             => 'edit my profile',
    'front.myprofil.edit'                       => 'edit',
    'front.myprofil.member-since'              	=> 'Member since',
    'front.myprofil.upload-avatar'              => 'upload avatar',
    'front.myprofil.delete-avatar'              => 'delete avatar',

    'front.home.top-manga-views'                => 'Top by views',

    /***** v1.9 *****/
    /** Admin **/
    'admin.settings.gdrive'                     => 'Google Drive',
    'admin.settings.gdrive.redirect-uri'        => 'Redirect URI',
    'admin.settings.gdrive.client-id'           => 'Client ID',
    'admin.settings.gdrive.client-secret'       => 'Client Secret',

    'admin.settings.general.reader-mode'        => 'Reader mode (images are preloaded in the two modes)',
    'admin.settings.general.reader-mode-noreload'  => 'Don\'t reload all the page (good for performance)',
    'admin.settings.general.reader-mode-reload'    => 'Reload all the page (good for ads impression)',

    'admin.settings.storage'                    => 'Storage Mode',
    'admin.settings.general.storage-type'       => 'Select how to store chapter images',
    'admin.settings.general.storage-type-server'=> 'Local server',
    'admin.settings.general.storage-type-gdrive'=> 'Google Drive',
    'admin.settings.general.storage-type-mirror'=> 'Copy URLs without downloading images (Used only for scraper mode)',

    'admin.chapter.scraper.storage-mode.gdrive' => 'Storage Mode: Google Drive (May take more time to complete).',
    'admin.chapter.scraper.storage-mode.mirror' => 'Storage Mode: Copy URLs without downloading images.',
    'admin.chapter.scraper.storage-mode.server' => 'Storage Mode: Local server.',

    'admin.manga.tags'                          => 'Tags',
    'admin.manga.create.tags'                   => 'Tags',

    'admin.chapter.edit.delete-chapters'        => 'Delete chapters',
    'admin.chapter.edit.confirm-delete-chapters'=> 'Are you sure to delete selected chapters?',
    'admin.chapter.edit.delete-pages'           => 'Delete pages',
    'admin.chapter.edit.confirm-delete-pages'   => 'Are you sure to delete selected pages?',

    /** Front **/
    'front.manga.tags'                          => 'Tags',
    'front.directory.browse-tags'               => "Browse $mangaPluralFUC By Tags",
    'front.reader.prevChap'                     => '←prev chapter',
    'front.reader.nextChap'                     => 'next chapter→',

    'front.home.comments'			=> 'Comments',
    'front.home.add-comment'			=> 'add comment',
    'front.home.add-comment-cancel'		=> 'cancel',
    'front.home.connect-to-comment'		=> 'please log-in to comment...',
    'front.home.comment-reply'                  => 'reply',
    'front.home.comment.builtin-tab'            => 'Built-in',

    /***** v2.0 *****/
    'error_404_title'                           => 'Oops! Page not found.',
    'error_404_description'                     => 'We could not find the page you were looking for.',
    'error_500_title'                           => 'Oops! Something went wrong.',
    'error_500_description'                     => 'We will work on fixing that right away.',

    /** Admin **/
    'admin.manga-plural'                        => "$mangaPluralFUC",
    'admin.item.create-success'                 => 'Item has been successfully created!',
    'admin.item.update-success'                 => 'Item has been successfully updated!',
    'admin.item.delete-success'                 => 'Item has been successfully deleted!',
    'admin.item.confirm-delete'                 => 'Are you sure you want to delete this item?',

    'admin.settings.create'                     => 'Create',
    'admin.settings.edit'                       => 'Edit',
    'admin.settings.update'                     => 'Update',
    'admin.settings.add'                        => 'Add',
    'admin.settings.remove'                     => 'Remove',
    'admin.settings.delete'                     => 'Delete',
    'admin.settings.cancel'                     => 'Cancel',
    'admin.settings.back'                       => 'Back',
    'admin.settings.title'                      => 'Title',
    'admin.settings.name'                       => 'Name',
    'admin.settings.slug'                       => 'Slug',
    'admin.settings.status'                     => 'Status',
    'admin.settings.url'                        => 'URL',
    'admin.settings.css_class'                  => 'CSS Class',
    'admin.settings.icon_font'                  => 'Icon Font',
    'admin.settings.target_type'                => 'Target Type',
    'admin.settings.custom_link'                => 'Custom Link',

    'admin.settings.menu.menu_info'             => 'Menu Info',
    'admin.settings.menu.structure'             => 'Menu Structure',

    'admin.routes'                              => 'Routes',

    'admin.settings.theme.main-menu'            => 'Main Menu',
    'admin.settings.theme.footer-menu'          => 'Footer Menu',
    'admin.settings.theme.boxed'                => 'Boxed style',

    'admin.settings.cache.clear_all_label'      => 'Delete all cache files',
    'admin.settings.cache.clear_all'            => 'Clear cache',
    'admin.settings.cache.clear_views_label'    => 'Delete all views generated from blad files',
    'admin.settings.cache.clear_views'          => 'Clear views',
    'admin.settings.cache.cache_config_label'   => 'This will combine all the configuration files into a single file which will be loaded quickly',
    'admin.settings.cache.cache_config'         => 'Cache config',
    'admin.settings.cache.clear_cache_config_label' => 'Clear cache config, when you modify a config file',
    'admin.settings.cache.clear_cache_config'   => 'Clear cache config',
    'admin.settings.cache.optim_autoloaded_label'   => 'Optimization of the autoloaded class',
    'admin.settings.cache.optim_autoloaded'     => 'Optimize autoloaded class',
    'admin.settings.cache.back_autoloaded_label'=> 'Return back to normal autoloaded class',
    'admin.settings.cache.back_autoloaded'      => 'Normal autoloaded class',

    'admin.tag.create'                          => 'Create Tag',
    'admin.tag.update'                          => 'Update Tag',
    'admin.manga.author_artist'                 => 'Author / Artist',
    'admin.author.create'                       => 'Create Author',
    'admin.author.update'                       => 'Update Author',

    'admin.modules'                             => 'Modules',
    'admin.modules.on'                          => 'enabled',
    'admin.modules.off'                         => 'disabled',
    'admin.modules.enable-msg'                  => 'Module successfully enabled!',
    'admin.modules.disable-msg'                 => 'Module successfully disabled!',

    'admin.settings.captcha'                    => 'Captcha',
    'admin.settings.captcha.info'               => 'The captcha system used is reCAPTCHA from google, to start use it fill this fields:<br/>(You can obtain keys from <a href="https://www.google.com/recaptcha/admin" target="_blank">here</a>)',
    'admin.settings.captcha.secret-key'         => 'Secret key',
    'admin.settings.captcha.site-key'           => 'Site key',
    'admin.settings.captcha.activate-captcha'   => 'Activate captcha for:',
    'admin.settings.captcha.form_login'         => 'Login',
    'admin.settings.captcha.form_register'      => 'Registration',
    'admin.settings.captcha.form_reset'         => 'Reset Password',
    'admin.settings.captcha.form_report'        => 'Report broken page',
    'admin.settings.captcha.form_contact'       => 'Contact form',

    'admin.users.subscribe.hint'                => 'If you choose confirmation by admin, then disable sending confirmation emails.',
];
