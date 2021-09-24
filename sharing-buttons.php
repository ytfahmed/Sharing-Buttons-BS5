<?php 
// Function to handle the thumbnail request
function get_the_post_thumbnail_src($img)
{
  return (preg_match('~\bsrc="([^"]++)"~', $img, $matches)) ? $matches[1] : '';
}   
function bs_share_buttons() {
    global $post;
    if(is_singular() || is_home()){
    
        // Get current page URL 
        $bs_url = urlencode(get_permalink());
 
        // Get current page title
        $bs_title = str_replace( ' ', '%20', get_the_title());
        
        // Subject
        $bs_subject = __( 'Look what I found: ', 'bootscore' );

        // Get Post Thumbnail for pinterest
        $bs_thumb = get_the_post_thumbnail_src(get_the_post_thumbnail());
  
        // Construct sharing URL without using any script
        $twitterURL = 'https://twitter.com/intent/tweet?text='.$bs_subject.' '.$bs_title.'&amp;url='.$bs_url;
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$bs_url;
        $whatsappURL = 'whatsapp://send?text='.$bs_subject.' '.$bs_title . ' ' . $bs_url;
        $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$bs_url.'&amp;title='.$bs_title;
        $redditURL = 'http://reddit.com/submit?url='.$bs_url.'&amp;title='.$bs_title;
        $tumblrURL = 'http://www.tumblr.com/share/link?url='.$bs_url.'&amp;title='.$bs_title;
        $bufferURL = 'https://bufferapp.com/add?url='.$bs_url.'&amp;text='.$bs_title;
        $mixURL = 'http://www.stumbleupon.com/submit?url='.$bs_url.'&amp;text='.$bs_title;
        $vkURL = 'http://vkontakte.ru/share.php?url='.$bs_url.'&amp;text='.$bs_title;
        $mailURL = 'mailto:?Subject='.$bs_subject.' '.$bs_title.'&amp;Body='.$bs_title.' '.$bs_url.'';
        
       if(!empty($bs_thumb)) {
            $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$bs_url.'&amp;media='.$bs_thumb[0].'&amp;description='.$bs_title;
        }
        else {
            $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$bs_url.'&amp;description='.$bs_title;
        }
 
        // Based on popular demand added Pinterest too
       // $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$bs_url.'&amp;media='.$bs_thumb[0].'&amp;description='.$bs_title;

        // Add sharing button at the end of page/page content
        $content = '<div id="share-buttons" class="d-flex justify-content-end mb-2 d-print-none">';
        $content .= '<div class="btn-group dropstart">';
        $content .= '<button type="button" class="btn btn-brand dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">';
        $content .='<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="me-2 bi bi-share-fill" viewBox="0 0 16 16">
        <path d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z"/>
      </svg></button>';
        $content .='<ul class="dropdown-menu bg-dark" aria-labelledby="dropdownShareMenu">';
        $content .= '<li><a class="text-white dropdown-item     mb-1 btn btn-sm btn-twitter" title="Twitter" href="'. $twitterURL .'" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="me-2 bi bi-twitter" viewBox="0 0 16 16">
        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
      </svg> Twitter</a></li> ';
        $content .= '<li><a class="text-white dropdown-item     mb-1 btn btn-sm btn-facebook" title="Facebook" href="'.$facebookURL.'" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="me-2 bi bi-facebook" viewBox="0 0 16 16">
        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
      </svg> Facebook</a></li> ';
        $content .= '<li><a class="text-white dropdown-item     mb-1 btn btn-sm btn-whatsapp" title="Whatsapp" href="'.$whatsappURL.'" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="me-2 bi bi-whatsapp" viewBox="0 0 16 16">
        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
      </svg> WhatsApp</a></li> ';
     //   $content .= '<li><a class="text-white dropdown-item     mb-1 btn btn-sm btn-pinterest" title="Pinterest" href="'.$pinterestURL.'" data-pin-custom="true" target="_blank" rel="nofollow"><i class="fab fa-pinterest-p"></i></a></li> ';
        $content .= '<li><a class="text-white dropdown-item     mb-1 btn btn-sm btn-linkedin" title="LinkedIn" href="'.$linkedInURL.'" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="me-2 bi bi-linkedin" viewBox="0 0 16 16">
        <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
      </svg> LinkedIn</a></li> ';
        $content .= '<li><a class="text-white dropdown-item     mb-1 btn btn-sm btn-reddit" title="Reddit" href="'.$redditURL.'" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="me-2 bi bi-reddit" viewBox="0 0 16 16">
        <path d="M6.167 8a.831.831 0 0 0-.83.83c0 .459.372.84.83.831a.831.831 0 0 0 0-1.661zm1.843 3.647c.315 0 1.403-.038 1.976-.611a.232.232 0 0 0 0-.306.213.213 0 0 0-.306 0c-.353.363-1.126.487-1.67.487-.545 0-1.308-.124-1.671-.487a.213.213 0 0 0-.306 0 .213.213 0 0 0 0 .306c.564.563 1.652.61 1.977.61zm.992-2.807c0 .458.373.83.831.83.458 0 .83-.381.83-.83a.831.831 0 0 0-1.66 0z"/>
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.828-1.165c-.315 0-.602.124-.812.325-.801-.573-1.9-.945-3.121-.993l.534-2.501 1.738.372a.83.83 0 1 0 .83-.869.83.83 0 0 0-.744.468l-1.938-.41a.203.203 0 0 0-.153.028.186.186 0 0 0-.086.134l-.592 2.788c-1.24.038-2.358.41-3.17.992-.21-.2-.496-.324-.81-.324a1.163 1.163 0 0 0-.478 2.224c-.02.115-.029.23-.029.353 0 1.795 2.091 3.256 4.669 3.256 2.577 0 4.668-1.451 4.668-3.256 0-.114-.01-.238-.029-.353.401-.181.688-.592.688-1.069 0-.65-.525-1.165-1.165-1.165z"/>
      </svg> Reddit</a></li> '; 
     //   $content .= '<li><a class="text-white dropdown-item     mb-1 btn btn-sm btn-tumblr" title="Tumblr" href="'.$tumblrURL.'" target="_blank" rel="nofollow"><i class="fab fa-tumblr"></i></a></li> ';
     //   $content .= '<li><a class="text-white dropdown-item     mb-1 btn btn-sm btn-buffer" title="Buffer" href="'.$bufferURL.'" target="_blank" rel="nofollow"><i class="fab fa-buffer"></i></a></li> ';
     //   $content .= '<li><a class="text-white dropdown-item     mb-1 btn btn-sm btn-mix" title="mix" href="'.$mixURL.'" target="_blank" rel="nofollow"><i class="fab fa-mix"></i></a></li> ';
     //   $content .= '<li><a class="text-white dropdown-item     mb-1 btn btn-sm btn-vk" title="vk" href="'.$vkURL.'" target="_blank" rel="nofollow"><i class="fab fa-vk"></i></a></li> ';
        $content .= '<li><a class="text-white dropdown-item     mb-1 btn btn-sm btn-mail btn-dark" title="Mail" href="'.$mailURL.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="me-2 bi bi-envelope" viewBox="0 0 16 16">
        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
      </svg> Email</a></li> ';
        $content .= '<li><a class="text-white dropdown-item     mb-1 btn btn-sm btn-print btn-dark" title="Print" href="javascript:;" onclick="window.print()"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="me-2 bi bi-printer" viewBox="0 0 16 16">
        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
        <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
      </svg> Print</a></li>';
        $content .= '</ul>';
        $content .= '</div>'; //dropdown closing
        $content .= '</div>';
        
        return $content;
    }else{
        // if not a post/page then don't include sharing button
        return $content;
    }
};


// This will create a wordpress shortcode [share-buttons].
add_shortcode('bs-share-buttons','bs_share_buttons');
