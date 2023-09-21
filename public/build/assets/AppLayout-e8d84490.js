import{i as w,O as _,o as r,d as f,a as t,t as v,e as a,g as i,h as y,J as k,j as u,c as d,w as n,n as $,s as b,b as m}from"./app-6c5b59c0.js";import{_ as h}from"./_plugin-vue_export-helper-c27b6911.js";const S={components:{Link:w},props:{auth:Object},computed:{profilePic(){return"/img/user.svg"}},methods:{toggleMenu(e){const o=document.querySelector("#"+e+" .menu"),c=document.querySelector("#"+e+" .menu-overflow");o.classList.toggle("hidden"),o.classList.toggle("fadeIn"),c.classList.toggle("hidden")},toggleMenuOverflow(){const e=document.getElementsByClassName("menu-overflow");for(const o of e)o.classList.contains("hidden")||(o.nextSibling.classList.remove("fadeIn"),o.nextSibling.classList.add("hidden"),o.classList.add("hidden"))},logout(){_.post(route("logout"))}}},L={class:"bg-gray-500 md:fixed md:w-full md:top-0 md:z-20 flex flex-row flex-wrap justify-between items-center bg-white p-6 border-b border-gray-300"},z=k('<div class="flex-none w-56 flex flex-row items-center"><img src="/logo.png" class="w-10 flex-none"><strong class="capitalize ml-1 flex-1">SCIS - CK TEDAM</strong><button id="sliderBtn" class="flex-none text-right text-gray-900 hidden md:block"><i class="fad fa-list-ul"></i></button></div><button id="navbarToggle" class="hidden md:block md:fixed right-0 mr-6"><i class="fad fa-chevron-double-down"></i></button>',2),C={id:"navbar",class:"animated md:hidden md:fixed md:top-0 md:w-full md:left-0 md:mt-16 md:border-t md:border-b md:border-gray-200 md:p-10 md:bg-white pl-3 flex flex-row flex-wrap items-center md:flex-col md:items-center"},N={class:"flex flex-row-reverse items-center"},B={id:"user-dropdown",class:"dropdown relative md:static"},M={class:"w-8 h-8 overflow-hidden rounded-full"},O=["src"],q={class:"ml-2 capitalize flex"},V={class:"text-sm text-gray-800 font-semibold m-0 p-0 leading-none"},j=t("i",{class:"fad fa-chevron-down ml-2 text-xs leading-none"},null,-1),D={class:"text-gray-500 menu hidden md:mt-10 md:w-full rounded bg-white shadow-md absolute z-20 right-0 w-40 mt-5 py-2 animated faster"},A=["href"],E=t("i",{class:"fad fa-user-edit text-xs mr-1"},null,-1),I=["href"],P=t("i",{class:"fad fa-inbox-in text-xs mr-1"},null,-1),T=["href"],H=t("i",{class:"fad fa-comment-alt-dots text-xs mr-1"},null,-1),J=["href"],K=t("i",{class:"fad fa-comment-alt-dots text-xs mr-1"},null,-1),R=t("hr",null,null,-1),U=t("button",{type:"submit",class:"block w-full px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out"},[t("i",{class:"fad fa-user-times text-xs mr-1"}),a(" Log Out ")],-1),F=[U];function G(e,o,c,g,p,l){return r(),f("div",L,[z,t("div",C,[t("div",N,[t("div",B,[t("button",{onClick:o[0]||(o[0]=s=>l.toggleMenu("user-dropdown")),class:"menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center"},[t("div",M,[t("img",{class:"w-full h-full object-cover",src:l.profilePic},null,8,O)]),t("div",q,[t("h1",V,v(e.$page.props.auth.user.name),1),j])]),t("button",{onClick:o[1]||(o[1]=s=>l.toggleMenuOverflow()),class:"hidden fixed top-0 left-0 z-10 w-full h-full menu-overflow"}),t("div",D,[t("a",{class:"px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out",href:e.route("profile.show")},[E,a(" My profile ")],8,A),t("a",{class:"px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out",href:e.route("requests.index")},[P,a(" my requests ")],8,I),e.is("student")?(r(),f("a",{key:0,class:"px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out",href:e.route("courses.index")},[H,a(" my courses ")],8,T)):i("",!0),e.is("lecturer")?(r(),f("a",{key:1,class:"px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out",href:e.route("courses.index")},[K,a(" my students ")],8,J)):i("",!0),R,t("form",{onSubmit:o[2]||(o[2]=y((...s)=>l.logout&&l.logout(...s),["prevent"]))},F,32)])])])])])}const Q=h(S,[["render",G]]),W={components:{Link:w},props:{icon:{type:String,default:"fad fa-users"},href:{type:String,default:"/"}}};function X(e,o,c,g,p,l){const s=u("Link");return r(),d(s,{href:c.href,class:"mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500"},{default:n(()=>[t("i",{class:$(c.icon+" text-xs mr-2")},null,2),b(e.$slots,"default")]),_:3},8,["href"])}const Y=h(W,[["render",X]]),Z={components:{SidebarLink:Y}},ee={id:"sideBar",class:"relative flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster"},te={class:"flex flex-col"},se=t("div",{class:"text-right hidden md:block mb-4"},[t("button",{id:"sideBarHideBtn"},[t("i",{class:"fad fa-times-circle"})])],-1),oe=t("p",{class:"uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider"}," Manage ",-1);function ae(e,o,c,g,p,l){const s=u("SidebarLink");return r(),f("div",ee,[t("div",te,[se,oe,m(s,{icon:"fad fa-users",href:"/dashboard"},{default:n(()=>[a("Dashboard")]),_:1}),e.can("read other users")?(r(),d(s,{key:0,icon:"fad fa-users",href:e.route("users.index")},{default:n(()=>[a("Users")]),_:1},8,["href"])):i("",!0),m(s,{icon:"fad fa-window-alt",href:e.route("requests.index")},{default:n(()=>[a("Requests")]),_:1},8,["href"]),e.can("read levels")?(r(),d(s,{key:1,icon:"fad fa-window-alt",href:e.route("levels.index")},{default:n(()=>[a("Levels")]),_:1},8,["href"])):i("",!0),e.can("read semesters")?(r(),d(s,{key:2,icon:"fad fa-window-alt",href:e.route("semesters.index")},{default:n(()=>[a("Semesters")]),_:1},8,["href"])):i("",!0),e.can("read departments")?(r(),d(s,{key:3,icon:"fad fa-window-alt",href:e.route("departments.index")},{default:n(()=>[a("Departments")]),_:1},8,["href"])):i("",!0),e.can("read programmes")?(r(),d(s,{key:4,icon:"fad fa-window-alt",href:e.route("programmes.index")},{default:n(()=>[a("Programmes")]),_:1},8,["href"])):i("",!0),e.can("read courses")?(r(),d(s,{key:5,icon:"fad fa-window-alt",href:e.route("courses.index")},{default:n(()=>[a("Courses")]),_:1},8,["href"])):i("",!0),e.can("read contacts")?(r(),d(s,{key:6,icon:"fad fa-window-alt",href:e.route("contacts.index")},{default:n(()=>[a("Contacts")]),_:1},8,["href"])):i("",!0),e.can("read notices")?(r(),d(s,{key:7,icon:"fad fa-window-alt",href:e.route("notices.index")},{default:n(()=>[a("Notices")]),_:1},8,["href"])):i("",!0)])])}const re=h(Z,[["render",ae]]),ne={components:{Navbar:Q,Sidebar:re}},ie={class:"text-gray-950"},de={class:"h-screen flex flex-row flex-wrap"};function le(e,o,c,g,p,l){const s=u("Navbar"),x=u("Sidebar");return r(),f("body",ie,[m(s),t("div",de,[m(x),b(e.$slots,"default")])])}const ue=h(ne,[["render",le]]);export{ue as A};