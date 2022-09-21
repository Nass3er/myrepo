




<div class="post-layout">
    <div class="votecell post-layout--left">
        <div class="js-voting-container d-flex jc-center fd-column ai-stretch gs4 fc-black-200" data-post-id="68682234">
    <button class="js-vote-up-btn flex--item s-btn s-btn__unset c-pointer " data-controller="s-tooltip" data-s-tooltip-placement="right" aria-pressed="false" aria-label="Up vote" data-selected-classes="fc-theme-primary" data-unselected-classes="" aria-describedby="--stacks-s-tooltip-6449edeu">
        <svg aria-hidden="true" class="svg-icon iconArrowUpLg" width="36" height="36" viewBox="0 0 36 36"><path d="M2 25h32L18 9 2 25Z"></path></svg>
    </button><div id="--stacks-s-tooltip-6449edeu" class="s-popover s-popover__tooltip" role="tooltip">This question shows research effort; it is useful and clear<div class="s-popover--arrow"></div></div>
    <div class="js-vote-count flex--item d-flex fd-column ai-center fc-black-500 fs-title" itemprop="upvoteCount" data-value="0">
         
    </div>
    <button class="js-vote-down-btn flex--item s-btn s-btn__unset c-pointer " data-controller="s-tooltip" data-s-tooltip-placement="right" aria-pressed="false" aria-label="Down vote" data-selected-classes="fc-theme-primary" data-unselected-classes="" aria-describedby="--stacks-s-tooltip-y6sb0sor">
        <svg aria-hidden="true" class="svg-icon iconArrowDownLg" width="36" height="36" viewBox="0 0 36 36"><path d="M2 11h32L18 27 2 11Z"></path></svg>
    </button><div id="--stacks-s-tooltip-y6sb0sor" class="s-popover s-popover__tooltip" role="tooltip">This question does not show any research effort; it is unclear or not useful<div class="s-popover--arrow"></div></div>

    <button class="js-bookmark-btn s-btn s-btn__unset c-pointer py4 js-gps-track" data-controller="s-tooltip" data-s-tooltip-placement="right" aria-pressed="false" aria-label="Bookmark" data-selected-classes="fc-yellow-600" data-gps-track="post.click({ item: 1, priv: 0, post_type: 1 })" aria-describedby="--stacks-s-tooltip-a1qqozg6">
        <svg aria-hidden="true" class="svg-icon iconBookmark" width="18" height="18" viewBox="0 0 18 18"><path d="M3 17V3c0-1.1.9-2 2-2h8a2 2 0 0 1 2 2v14l-6-4-6 4Z"></path></svg>
        <div class="js-bookmark-count mt4 d-none" data-value=""></div>
    </button><div id="--stacks-s-tooltip-a1qqozg6" class="s-popover s-popover__tooltip" role="tooltip">Bookmark this question.<div class="s-popover--arrow"></div></div>




    <a class="js-post-issue flex--item s-btn s-btn__unset c-pointer py6 mx-auto" href="/posts/68682234/timeline" data-shortcut="T" data-ks-title="timeline" data-controller="s-tooltip" data-s-tooltip-placement="right" aria-label="Timeline" aria-describedby="--stacks-s-tooltip-9rx8szyk"><svg aria-hidden="true" class="mln2 mr0 svg-icon iconHistory" width="19" height="18" viewBox="0 0 19 18"><path d="M3 9a8 8 0 1 1 3.73 6.77L8.2 14.3A6 6 0 1 0 5 9l3.01-.01-4 4-4-4h3L3 9Zm7-4h1.01L11 9.36l3.22 2.1-.6.93L10 10V5Z"></path></svg></a><div id="--stacks-s-tooltip-9rx8szyk" class="s-popover s-popover__tooltip" role="tooltip">Show activity on this post.<div class="s-popover--arrow"></div></div>

</div>

    </div>



<div class="postcell post-layout--right">

<div class="s-prose js-post-body" itemprop="text">

<p>I am trying to toggle the "li-active" class to each of my nav-bar link li when clicked. At the moment, after the first click, the current li-active class gets removed and carries the class to the newly clicked li. Great. Yet, when clicked on a different li the previous li doesn't remove the class, but the new li gets the class.
I may be overlooking a step.. thank you in advance!</p>
<pre class="default s-code-block"><code class="hljs language-xml"> <span class="hljs-tag">&lt;<span class="hljs-name">li</span> <span class="hljs-attr">data-id</span>=<span class="hljs-string">"0"</span> <span class="hljs-attr">id</span>=<span class="hljs-string">"mercury"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"navbar__links--li"</span>&gt;</span>
          <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"inner-div"</span>&gt;</span>
            <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mercury-oval"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
            MERCURY
          <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
          <span class="hljs-tag">&lt;<span class="hljs-name">svg</span>
            <span class="hljs-attr">class</span>=<span class="hljs-string">"svg"</span>
            <span class="hljs-attr">xmlns</span>=<span class="hljs-string">"http://www.w3.org/2000/svg"</span>
            <span class="hljs-attr">width</span>=<span class="hljs-string">"6"</span>
            <span class="hljs-attr">height</span>=<span class="hljs-string">"8"</span>
          &gt;</span>
</code></pre>
<pre class="default s-code-block"><code class="hljs language-less"><span class="hljs-selector-class">.li-active</span> {
<span class="hljs-variable">@include</span> desktop {
<span class="hljs-attribute">border-top</span>: <span class="hljs-number">1px</span> solid red;
}
}
</code></pre>
<pre class="default s-code-block"><code class="hljs language-coffeescript">menuBtn.forEach(<span class="hljs-function"><span class="hljs-params">(li)</span> =&gt;</span> {
li.addEventListener(<span class="hljs-string">"click"</span>, <span class="hljs-function"><span class="hljs-params">(e)</span> =&gt;</span> {
menuBtn.forEach(<span class="hljs-function"><span class="hljs-params">(el)</span> =&gt;</span> el.classList.remove(<span class="hljs-string">"li-active"</span>));
e.target.classList.add(<span class="hljs-string">"li-active"</span>);
});
});

</code></pre>
<p><a href="https://i.stack.imgur.com/T1zTB.jpg" rel="nofollow noreferrer"><img src="https://i.stack.imgur.com/T1zTB.jpg" alt="enter image description here"></a></p>
</div>

    <div class="mt24 mb12">
        <div class="post-taglist d-flex gs4 gsy fd-column">
            <div class="d-flex ps-relative fw-wrap">
                <ul class="ml0 list-ls-none js-post-tag-list-wrapper d-inline"><li class="d-inline mr4 js-post-tag-list-item"><a href="/questions/tagged/javascript" class="post-tag" title="show questions tagged 'javascript'" aria-label="show questions tagged 'javascript'" rel="tag" aria-labelledby="javascript-container">javascript</a></li><li class="d-inline mr4 js-post-tag-list-item"><a href="/questions/tagged/html" class="post-tag" title="show questions tagged 'html'" aria-label="show questions tagged 'html'" rel="tag" aria-labelledby="html-container">html</a></li><li class="d-inline mr4 js-post-tag-list-item"><a href="/questions/tagged/css" class="post-tag" title="show questions tagged 'css'" aria-label="show questions tagged 'css'" rel="tag" aria-labelledby="css-container">css</a></li></ul>
            </div>
        </div>
    </div>

<div class="mb0 ">
    <div class="mt16 d-flex gs8 gsy fw-wrap jc-end ai-start pt4 mb16">
        <div class="flex--item mr16 fl1 w96">



<div class="js-post-menu pt2" data-post-id="68682234">
<div class="d-flex gs8 s-anchors s-anchors__muted fw-wrap">

        <div class="flex--item">
            <a href="/q/68682234" rel="nofollow" itemprop="url" class="js-share-link js-gps-track" title="Short permalink to this question" data-gps-track="post.click({ item: 2, priv: 0, post_type: 1 })" data-controller="se-share-sheet s-popover" data-se-share-sheet-title="Share a link to this question" data-se-share-sheet-subtitle="" data-se-share-sheet-post-type="question" data-se-share-sheet-social="facebook twitter devto" data-se-share-sheet-location="1" data-se-share-sheet-license-url="https%3a%2f%2fcreativecommons.org%2flicenses%2fby-sa%2f4.0%2f" data-se-share-sheet-license-name="CC BY-SA 4.0" data-s-popover-placement="bottom-start" aria-controls="se-share-sheet-0" data-action=" s-popover#toggle se-share-sheet#preventNavigation s-popover:show->se-share-sheet#willShow s-popover:shown->se-share-sheet#didShow" aria-expanded="false">Share</a><div class="s-popover z-dropdown s-anchors s-anchors__default" style="width: unset; max-width: 28em;" id="se-share-sheet-0"><div class="s-popover--arrow"></div><div><label class="js-title fw-bold" for="share-sheet-input-se-share-sheet-0">Share a link to this question</label> <span class="js-subtitle"></span></div><div class="my8"><input type="text" id="share-sheet-input-se-share-sheet-0" class="js-input s-input wmn3 sm:wmn-initial bc-black-200 bg-white fc-dark" readonly=""></div><div class="d-flex jc-space-between ai-center mbn4"><button class="js-copy-link-btn s-btn s-btn__link js-gps-track" data-gps-track="">Copy link</button><a href="https://creativecommons.org/licenses/by-sa/4.0/" rel="license" class="js-license s-block-link w-auto" target="_blank" title="The current license for this post: CC BY-SA 4.0">CC BY-SA 4.0</a><div class="js-social-container d-none"></div></div></div>
        </div>



        <div class="flex--item">
            <button type="button" id="btnFollowPost-68682234" class="s-btn s-btn__link js-follow-post js-follow-question js-gps-track" data-gps-track="post.click({ item: 14, priv: 0, post_type: 1 })" data-controller="s-tooltip " data-s-tooltip-placement="bottom" data-s-popover-placement="bottom" aria-controls="" aria-describedby="--stacks-s-tooltip-vtfy3oaa">
                Follow
            </button><div id="--stacks-s-tooltip-vtfy3oaa" class="s-popover s-popover__tooltip" role="tooltip">Follow this question to receive notifications<div class="s-popover--arrow"></div></div>
        </div>






</div>
<div class="js-menu-popup-container"></div>
</div>
        </div>

        <div class="post-signature owner flex--item">
            <div class="user-info ">
<div class="user-action-time">
    asked <span title="2021-08-06 13:16:48Z" class="relativetime">Aug 6, 2021 at 13:16</span>
</div>
<div class="user-gravatar32">
    <a href="/users/15804217/felipe"><div class="gravatar-wrapper-32"><img src="https://www.gravatar.com/avatar/78c193e8c213d20aaf9d02f148727528?s=64&amp;d=identicon&amp;r=PG&amp;f=1" alt="Felipe's user avatar" width="32" height="32" class="bar-sm"></div></a>
</div>
<div class="user-details" itemprop="author" itemscope="" itemtype="http://schema.org/Person">
    <a href="/users/15804217/felipe">Felipe</a><span class="d-none" itemprop="name">Felipe</span>
    <div class="-flair">
        <span class="reputation-score" title="reputation score " dir="ltr">233</span><span title="3 silver badges" aria-hidden="true"><span class="badge2"></span><span class="badgecount">3</span></span><span class="v-visible-sr">3 silver badges</span><span title="11 bronze badges" aria-hidden="true"><span class="badge3"></span><span class="badgecount">11</span></span><span class="v-visible-sr">11 bronze badges</span>
    </div>
</div>
</div>


        </div>
    </div>
</div>

</div>




        <span class="d-none" itemprop="commentCount"></span>
<div class="post-layout--right js-post-comments-component">
    <div id="comments-68682234" class="comments js-comments-container bt bc-black-075 mt12  dno" data-post-id="68682234" data-min-length="15">
        <ul class="comments-list js-comments-list" data-remaining-comments-count="0" data-canpost="false" data-cansee="true" data-comments-unavailable="false" data-addlink-disabled="true">

        </ul>
    </div>

    <div id="comments-link-68682234" data-rep="50" data-anon="true">
                <a class="js-add-link comments-link disabled-link" title="Use comments to ask for more information or suggest improvements. Avoid answering questions in comments." href="#" role="button">Add a comment</a>
            <span class="js-link-separator dno">&nbsp;|&nbsp;</span>
        <a class="js-show-link comments-link dno" title="Expand to show all comments on this post" href="#" onclick="" role="button"></a>
    </div>
</div>
</div>
