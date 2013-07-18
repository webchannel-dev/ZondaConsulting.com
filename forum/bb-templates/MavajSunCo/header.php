<?php
$_head_profile_attr = '';
if (bb_is_profile()) {
    global $self;
    if (!$self) {
        $_head_profile_attr = ' profile="http://www.w3.org/2006/03/hcard"';
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"<?php bb_language_attributes('1.1'); ?>>
    <head<?php echo $_head_profile_attr; ?>>
        <link href='http://fonts.googleapis.com/css?family=Tenor+Sans' rel='stylesheet' type='text/css'>
            <meta http-equiv="X-UA-Compatible" content="IE=8" />
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title><?php bb_title() ?></title>
            <link rel="stylesheet" href="<?php bb_stylesheet_uri(); ?>" type="text/css" />
            <?php if ('rtl' == bb_get_option('text_direction')) : ?>
                <link rel="stylesheet" href="<?php bb_stylesheet_uri('rtl'); ?>" type="text/css" />
            <?php endif; ?>
            <?php bb_feed_head(); ?>
            <?php bb_head(); ?>
            <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
            <script type="text/javascript" src="http://www.javascripttoolbox.com/libsource.php/popup/combined/popup.js"></script>
             <script type="text/javascript" src="http://www.zondaconsulting.com/htdocs/js/analyticstracking.js"></script>
    </head>
    <body id="<?php bb_location(); ?>">
        <div id="wrapper">
            <div id="header" role="banner">
                <img src="http://www.zondaconsulting.com/forum/bb-templates/MavajSunCo/images/Talk_01.png" width="1024px" height="253px" usemap="#Navigation" border="0"/>
                <map name="Navigation">
                    <area shape="rect" coords="451,181,511,203" href="http://www.zondaconsulting.com/about.html">
                        <area shape="rect" coords="544,182,587,202" href="http://www.zondaconsulting.com/forum">
                            <area shape="rect" coords="618,181,679,203" href="http://www.zondaconsulting.com/client.html">
                                <area shape="rect" coords="707,181,785,203" href="http://www.zondaconsulting.com/carrers.php">
                                    <area shape="rect" coords="810,182,886,204" href="http://www.zondaconsulting.com/contact.html">
                                        <area shape="poly" coords="110,117,389,148,337,237,137,242" href="http://www.zondaconsulting.com/">
                                            </map>
                <br/><br/>
                                          <center>
                                              <p style="font-size: 13px;">
                                                We like to Talk. Just post a question and get advice and guidance from our team.
                                                Please click <a href="#" onclick="Popup.showModal('modal', null, null, {'screenColor': '#6D6E70', 'screenOpacity': .6});
                                                        return false;">here</a>  to see our Forum guidelines.
                                            </p>
                                          </center>
                                                                                                <!--h1><a href="<?php bb_uri(); ?>"><?php bb_option('name'); ?></a></h1-->
                                            <?php if (bb_get_option('description')) : ?><p class="description"><?php bb_option('description'); ?></p><?php endif; ?>

<?php if (!in_array(bb_get_location(), array('login-page', 'register-page'))) login_form(); ?>

                                            <div class="search">
<?php search_form(); ?>
                                            </div>
                                            </div>
                                            <div id="modal" 
                                                 style="
                                                 background-color:white; 
                                                 border-radius: 5px; 

                                                 display:none;
                                                 width:800px;
                                                 height:400px; 
                                                 overflow: auto; 
                                                 padding:25px;
                                                 font-size: 14px;
                                                 ">
                                                <h1 onClick="Popup.hide('modal')" dir="rtl" style="background: #00C4FF; padding: 10px; width: 20px; height: 20px; position: absolute; right: 5px; top:5px; border-radius: 20px; color: white;">X</h1>
                                                <br/>
                                                <br/>
                                                <br/>
                                                <h3 style="color: #00C4FF">Support Forum Guidelines</h3>
                                                <br/><br/>
                                                <p>
                                                    The purpose of this site is to provide a <b>place for consultants at Zonda to give free advice to anyone who wishes it</b>, by building up a helpful support community and knowledge base on all aspects of Zonda products and services. You can add posts to the forum asking or giving advice. It’s created by customers, for customers.
                                                </p>
                                                <p>
                                                    <b>To become a highly rated contributor and for us to give you the best advice, you need to share useful information</b>. Whether the information is technical or non-technical, it needs to help us solve problems and help fellow members get the most out of our posts.
                                                </p>
                                                <p>
                                                    If posts are helpful they are given a <b><u>Kudos</u></b> rating by other members, increasing the overall quality of the community. If a post is answered correctly you can mark the correct post as the <b><u>Accepted Solution</u></b> to the question. This tells other members that the post has been answered correctly.
                                                </p>
                                                <p>
                                                    While aimed at potential Zonda customers, everyone can join and post in the context of the forum subject matter. What isn't permitted is abusive, objectionable and offensive posts, including trolling and flaming. These may be edited and or deleted at any time, with or without an explanation.
                                                </p>
                                                <p>
                                                    If the Forum team encounter a serious breach we have the right to temporarily and or permanently remove such user’s abilities to post.
                                                </p>
                                                <p>
                                                    We really don't want to impose strict rules - but we do need to maintain a healthy forum. To create a community you'll feel comfortable participating in, we’ve listed some quick guidelines for the benefit of everyone using this website. 
                                                </p>
                                                <br/>
                                                <h3 style="color: #00C4FF">The do’s and don’ts:</h3>
                                                <br/><br/>
                                                <h3>Do</h3>
                                                <br/><br/>
                                                <ul>
                                                    <li><b>Use a meaningful 'Subject' line.</b></br>
                                                        <p>
                                                            Many people decide whether they want to read a forum message based on the subject line. It’s more useful to say what topic you need help with or indicate a specific issue rather than put ‘help needed’.
                                                            We may occasionally change the title of a post to make the post more searchable for other Forum members. This also helps search engines pick up the most relevant posts, making it easier for other customers to find the best answers for their search term.
                                                        </p>
                                                    </li>
                                                    <li><b>Keep messages concise.</b></br>
                                                        <p>
                                                            Shorter posts are more likely to be read. But when longer messages are appropriate, use paragraphs to break it up for easy reading.
                                                        </p>
                                                    </li>
                                                    <li><b>Show appreciation.</b></br>
                                                        <p>
                                                            If you find a member’s advice helpful, you can show your appreciation by giving kudos, by accepting a solution that answers your question or by posting thank-you replies.
                                                        </p>
                                                    </li>
                                                    <li><b>Keep posts to the site on topic within threads.</b></br>
                                                        <p>
                                                            Always try and refer to the first post in a thread and either respond to that or another post talking about the same subject. Ignore posts that are off topic, as we may remove them anyway to keep the threads on topic and to get the maximum use out of the information on the site. Remember this is all about building a body of knowledge to help each other and that means finding information quickly and easily.
                                                        </p>
                                                    </li>
                                                    <li><b>Post new threads within relevant forum topics.</b></br>
                                                        <p>
                                                            We'll move threads that are in the wrong place but we would appreciate your help in keeping them in the correct areas because it makes it easier for other members to find them. If we get enough posts about a new subject, we’ll consider creating a new topic to house them in.
                                                        </p>
                                                    </li>
                                                </ul>
                                                </br></br></br>
                                                <h4>Don’t</h4>
                                                </br></br>
                                                <ul>
                                                    <li><b>Spam the site with links to other sites.</b></br>
                                                        <p>
                                                            This includes sending unsolicited private messages to other members. We do not allow spam advertising of other commercial sites by reference or linking. Linking to personal sites in signatures is fine. Linking to, or referring to pages on Zonda’s websites is fine too. If we detect a member using their signature to promote another third party site, we may, at our discretion, ask you to remove the link in question. No linking to or posting of obscene or offensive content whatsoever. If you are unsure, please ask a moderator first. Spammers - please don't waste our time and yours.
                                                        </p>
                                                    </li>
                                                    <li><b>Use offensive or bad language.</b></br>
                                                        <p>
                                                            Please treat others with respect. This is a friendly discussion forum and all members need to consider this by trying to be constructive when exchanging their views with one another. 
                                                        </p>
                                                    </li>
                                                    <li><b>Abuse each other.</b></br>
                                                        <p>
                                                            Please treat others with respect. This is a friendly discussion forum and all members need to consider this by trying to be constructive when exchanging their views with one another. 
                                                        </p>
                                                    </li>
                                                    <li><b>Post personal details.</b></br>
                                                        <p>
                                                            Please do not post any personal information on the forums, either your own or another user's. This includes email addresses, other contact details and copies of private emails or messages. If a moderator, administrator or employee asks you for personal information and you are happy to provide such details, please send them this information in a private message. If any other type of forum member asks for personal details, please send a private message to a moderator asking for their advice.
                                                        </p>
                                                    </li>
                                                    <li><b>Argue with a team request or decision.</b></br>
                                                        <p>
                                                            If a Forum team member has to make a request or take any action in a thread, members are not permitted to argue with or complain about the action publicly on the forum. If there are concerns or you do not agree with a specific decision from a team member, you must first direct your complaint to that Forum team member via a private message and wait for a response. Please consider that all team actions are usually considered final and are not open to public scrutiny or debate. Abuse of the forum, forum members or the Forum team managing it, is a breach of the guidelines.
                                                        </p>
                                                    </li>
                                                </ul>
                                                <p>We hope you find these guidelines helpful and look forward to seeing your posts on the forums.</p>
                                                <p>Thank you and welcome!</p>
                                                <p>The Z-Team</p>
                                                <br/> <br/> <br/>

                                            </div>
                                            <div id="main">
                                                <?php
                                                if (bb_is_profile())
                                                    profile_menu(); ?>