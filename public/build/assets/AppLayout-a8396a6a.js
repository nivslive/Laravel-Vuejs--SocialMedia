import{d as S,k as x,J as T,x as D,o,e as r,u as i,n as g,a as e,f as h,t as b,i as k,y as N,z as F,r as f,p as j,l as L,A as B,b as u,w as a,T as O,c as y,j as C,X as E,g as d,F as $,h as z,O as P}from"./app-98bc4e29.js";import{_ as V}from"./NavLink-607292d8.js";const I={class:"max-w-screen-xl mx-auto py-2 px-3 sm:px-6 lg:px-8"},R={class:"flex items-center justify-between flex-wrap"},H={class:"w-0 flex-1 flex items-center min-w-0"},J={key:0,class:"h-5 w-5 text-white",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor"},U=e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"},null,-1),X=[U],Y={key:1,class:"h-5 w-5 text-white",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor"},q=e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"},null,-1),G=[q],K={class:"ml-3 font-medium text-sm text-white truncate"},Q={class:"shrink-0 sm:ml-3"},W=e("svg",{class:"h-5 w-5 text-white",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M6 18L18 6M6 6l12 12"})],-1),Z=[W],ee={__name:"Banner",setup(c){const n=S(!0),s=x(()=>{var t;return((t=T().props.jetstream.flash)==null?void 0:t.bannerStyle)||"success"}),p=x(()=>{var t;return((t=T().props.jetstream.flash)==null?void 0:t.banner)||""});return D(p,async()=>{n.value=!0}),(t,v)=>(o(),r("div",null,[n.value&&i(p)?(o(),r("div",{key:0,class:g({"bg-indigo-500":i(s)=="success","bg-red-700":i(s)=="danger"})},[e("div",I,[e("div",R,[e("div",H,[e("span",{class:g(["flex p-2 rounded-lg",{"bg-indigo-600":i(s)=="success","bg-red-600":i(s)=="danger"}])},[i(s)=="success"?(o(),r("svg",J,X)):h("",!0),i(s)=="danger"?(o(),r("svg",Y,G)):h("",!0)],2),e("p",K,b(i(p)),1)]),e("div",Q,[e("button",{type:"button",class:g(["-mr-1 flex p-2 rounded-md focus:outline-none sm:-mr-2 transition",{"hover:bg-indigo-600 focus:bg-indigo-600":i(s)=="success","hover:bg-red-600 focus:bg-red-600":i(s)=="danger"}]),"aria-label":"Dismiss",onClick:v[0]||(v[0]=k(l=>n.value=!1,["prevent"]))},Z,2)])])])],2)):h("",!0)]))}},te={class:"relative"},A={__name:"Dropdown",props:{align:{type:String,default:"right"},width:{type:String,default:"48"},contentClasses:{type:Array,default:()=>["py-1","bg-white"]}},setup(c){const n=c;let s=S(!1);const p=l=>{s.value&&l.key==="Escape"&&(s.value=!1)};N(()=>document.addEventListener("keydown",p)),F(()=>document.removeEventListener("keydown",p));const t=x(()=>({48:"w-48"})[n.width.toString()]),v=x(()=>n.align==="left"?"origin-top-left left-0":n.align==="right"?"origin-top-right right-0":"origin-top");return(l,m)=>(o(),r("div",te,[e("div",{onClick:m[0]||(m[0]=M=>j(s)?s.value=!i(s):s=!i(s))},[f(l.$slots,"trigger")]),L(e("div",{class:"fixed inset-0 z-40",onClick:m[1]||(m[1]=M=>j(s)?s.value=!1:s=!1)},null,512),[[B,i(s)]]),u(O,{"enter-active-class":"transition ease-out duration-200","enter-from-class":"transform opacity-0 scale-95","enter-to-class":"transform opacity-100 scale-100","leave-active-class":"transition ease-in duration-75","leave-from-class":"transform opacity-100 scale-100","leave-to-class":"transform opacity-0 scale-95"},{default:a(()=>[L(e("div",{class:g(["absolute z-50 mt-2 rounded-md shadow-lg",[i(t),i(v)]]),style:{display:"none"},onClick:m[2]||(m[2]=M=>j(s)?s.value=!1:s=!1)},[e("div",{class:g(["rounded-md ring-1 ring-black ring-opacity-5",c.contentClasses])},[f(l.$slots,"content")],2)],2),[[B,i(s)]])]),_:3})]))}},se={key:0,type:"submit",class:"block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"},oe=["href"],w={__name:"DropdownLink",props:{href:String,as:String},setup(c){return(n,s)=>(o(),r("div",null,[c.as=="button"?(o(),r("button",se,[f(n.$slots,"default")])):c.as=="a"?(o(),r("a",{key:1,href:c.href,class:"block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"},[f(n.$slots,"default")],8,oe)):(o(),y(i(C),{key:2,href:c.href,class:"block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"},{default:a(()=>[f(n.$slots,"default")]),_:3},8,["href"]))]))}},_={__name:"ResponsiveNavLink",props:{active:Boolean,href:String,as:String},setup(c){const n=c,s=x(()=>n.active?"block w-full pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-left text-base font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out":"block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out");return(p,t)=>(o(),r("div",null,[c.as=="button"?(o(),r("button",{key:0,class:g([i(s),"w-full text-left"])},[f(p.$slots,"default")],2)):(o(),y(i(C),{key:1,href:c.href,class:g(i(s))},{default:a(()=>[f(p.$slots,"default")]),_:3},8,["href","class"]))]))}},re={class:"min-h-screen bg-gray-100"},ne={class:"bg-white border-b border-gray-100"},ae={class:"max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"},ie={class:"flex justify-between h-16"},le={class:"flex"},de={class:"shrink-0 flex items-center"},ue=e("b",null,"Yorus.",-1),ce={class:"hidden space-x-8 sm:-my-px sm:ml-10 sm:flex"},he={class:"hidden sm:flex sm:items-center sm:ml-6"},pe={class:"ml-3 relative"},ge={class:"inline-flex rounded-md"},fe={type:"button",class:"inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150"},me=e("svg",{class:"ml-2 -mr-0.5 h-4 w-4",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"})],-1),ve={class:"w-60"},_e=e("div",{class:"block px-4 py-2 text-xs text-gray-400"}," Manage Team ",-1),be=e("div",{class:"border-t border-gray-200"},null,-1),ye=e("div",{class:"block px-4 py-2 text-xs text-gray-400"}," Switch Teams ",-1),we=["onSubmit"],ke={class:"flex items-center"},xe={key:0,class:"mr-2 h-5 w-5 text-green-400",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor"},$e=e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"},null,-1),je=[$e],Se={class:"ml-3 relative"},Ce={key:0,class:"flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition"},Me=["src","alt"],Te={key:1,class:"inline-flex rounded-md"},Le={type:"button",class:"inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150"},Be=e("svg",{class:"ml-2 -mr-0.5 h-4 w-4",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M19.5 8.25l-7.5 7.5-7.5-7.5"})],-1),ze=e("div",{class:"block px-4 py-2 text-xs text-gray-400"}," Manage Account ",-1),Pe=e("div",{class:"border-t border-gray-200"},null,-1),Ae=["onSubmit"],De={class:"-mr-2 flex items-center sm:hidden"},Ne={class:"h-6 w-6",stroke:"currentColor",fill:"none",viewBox:"0 0 24 24"},Fe={class:"pt-2 pb-3 space-y-1"},Oe={class:"pt-4 pb-1 border-t border-gray-200"},Ee={class:"flex items-center px-4"},Ve={key:0,class:"shrink-0 mr-3"},Ie=["src","alt"],Re={class:"font-medium text-base text-gray-800"},He={class:"font-medium text-sm text-gray-500"},Je={class:"mt-3 space-y-1"},Ue=["onSubmit"],Xe=e("div",{class:"border-t border-gray-200"},null,-1),Ye=e("div",{class:"block px-4 py-2 text-xs text-gray-400"},"Manage Team",-1),qe=e("div",{class:"border-t border-gray-200"},null,-1),Ge=e("div",{class:"block px-4 py-2 text-xs text-gray-400"},"Switch Teams",-1),Ke=["onSubmit"],Qe={class:"flex items-center"},We={key:0,class:"mr-2 h-5 w-5 text-green-400",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor"},Ze=e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"},null,-1),et=[Ze],tt={key:0,class:"bg-white shadow"},st={class:"max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"},nt={__name:"AppLayout",props:{title:String},setup(c){const n=S(!1),s=t=>{P.put(route("current-team.update"),{team_id:t.id},{preserveState:!1})},p=()=>{P.post(route("logout"))};return(t,v)=>(o(),r("div",null,[u(i(E),{title:c.title},null,8,["title"]),u(ee),e("div",re,[e("nav",ne,[e("div",ae,[e("div",ie,[e("div",le,[e("div",de,[u(i(C),{href:t.route("dashboard")},{default:a(()=>[ue,d("club ")]),_:1},8,["href"])]),e("div",ce,[u(V,{href:t.route("dashboard"),active:t.route().current("dashboard")},{default:a(()=>[d(" Dashboard ")]),_:1},8,["href","active"])])]),e("div",he,[e("div",pe,[t.$page.props.jetstream.hasTeamFeatures?(o(),y(A,{key:0,align:"right",width:"60"},{trigger:a(()=>[e("span",ge,[e("button",fe,[d(b(t.$page.props.auth.user.current_team.name)+" ",1),me])])]),content:a(()=>[e("div",ve,[t.$page.props.jetstream.hasTeamFeatures?(o(),r($,{key:0},[_e,u(w,{href:t.route("teams.show",t.$page.props.auth.user.current_team)},{default:a(()=>[d(" Team Settings ")]),_:1},8,["href"]),t.$page.props.jetstream.canCreateTeams?(o(),y(w,{key:0,href:t.route("teams.create")},{default:a(()=>[d(" Create New Team ")]),_:1},8,["href"])):h("",!0),be,ye,(o(!0),r($,null,z(t.$page.props.auth.user.all_teams,l=>(o(),r("form",{key:l.id,onSubmit:k(m=>s(l),["prevent"])},[u(w,{as:"button"},{default:a(()=>[e("div",ke,[l.id==t.$page.props.auth.user.current_team_id?(o(),r("svg",xe,je)):h("",!0),e("div",null,b(l.name),1)])]),_:2},1024)],40,we))),128))],64)):h("",!0)])]),_:1})):h("",!0)]),e("div",Se,[u(A,{align:"right",width:"48"},{trigger:a(()=>[t.$page.props.jetstream.managesProfilePhotos?(o(),r("button",Ce,[e("img",{class:"h-8 w-8 rounded-full object-cover",src:t.$page.props.auth.user.profile_photo_url,alt:t.$page.props.auth.user.name},null,8,Me)])):(o(),r("span",Te,[e("button",Le,[d(b(t.$page.props.auth.user.name)+" ",1),Be])]))]),content:a(()=>[ze,u(w,{href:t.route("profile.show")},{default:a(()=>[d(" Profile ")]),_:1},8,["href"]),t.$page.props.jetstream.hasApiFeatures?(o(),y(w,{key:0,href:t.route("api-tokens.index")},{default:a(()=>[d(" API Tokens ")]),_:1},8,["href"])):h("",!0),Pe,e("form",{onSubmit:k(p,["prevent"])},[u(w,{as:"button"},{default:a(()=>[d(" Log Out ")]),_:1})],40,Ae)]),_:1})])]),e("div",De,[e("button",{class:"inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out",onClick:v[0]||(v[0]=l=>n.value=!n.value)},[(o(),r("svg",Ne,[e("path",{class:g({hidden:n.value,"inline-flex":!n.value}),"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M4 6h16M4 12h16M4 18h16"},null,2),e("path",{class:g({hidden:!n.value,"inline-flex":n.value}),"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M6 18L18 6M6 6l12 12"},null,2)]))])])])]),e("div",{class:g([{block:n.value,hidden:!n.value},"sm:hidden"])},[e("div",Fe,[u(_,{href:t.route("dashboard"),active:t.route().current("dashboard")},{default:a(()=>[d(" Dashboard ")]),_:1},8,["href","active"])]),e("div",Oe,[e("div",Ee,[t.$page.props.jetstream.managesProfilePhotos?(o(),r("div",Ve,[e("img",{class:"h-10 w-10 rounded-full object-cover",src:t.$page.props.auth.user.profile_photo_url,alt:t.$page.props.auth.user.name},null,8,Ie)])):h("",!0),e("div",null,[e("div",Re,b(t.$page.props.auth.user.name),1),e("div",He,b(t.$page.props.auth.user.email),1)])]),e("div",Je,[u(_,{href:t.route("profile.show"),active:t.route().current("profile.show")},{default:a(()=>[d(" Profile ")]),_:1},8,["href","active"]),t.$page.props.jetstream.hasApiFeatures?(o(),y(_,{key:0,href:t.route("api-tokens.index"),active:t.route().current("api-tokens.index")},{default:a(()=>[d(" API Tokens ")]),_:1},8,["href","active"])):h("",!0),e("form",{method:"POST",onSubmit:k(p,["prevent"])},[u(_,{as:"button"},{default:a(()=>[d(" Log Out ")]),_:1})],40,Ue),t.$page.props.jetstream.hasTeamFeatures?(o(),r($,{key:1},[Xe,Ye,u(_,{href:t.route("teams.show",t.$page.props.auth.user.current_team),active:t.route().current("teams.show")},{default:a(()=>[d(" Team Settings ")]),_:1},8,["href","active"]),t.$page.props.jetstream.canCreateTeams?(o(),y(_,{key:0,href:t.route("teams.create"),active:t.route().current("teams.create")},{default:a(()=>[d(" Create New Team ")]),_:1},8,["href","active"])):h("",!0),qe,Ge,(o(!0),r($,null,z(t.$page.props.auth.user.all_teams,l=>(o(),r("form",{key:l.id,onSubmit:k(m=>s(l),["prevent"])},[u(_,{as:"button"},{default:a(()=>[e("div",Qe,[l.id==t.$page.props.auth.user.current_team_id?(o(),r("svg",We,et)):h("",!0),e("div",null,b(l.name),1)])]),_:2},1024)],40,Ke))),128))],64)):h("",!0)])])],2)]),t.$slots.header?(o(),r("header",tt,[e("div",st,[f(t.$slots,"header")])])):h("",!0),e("main",null,[f(t.$slots,"default")])])]))}};export{nt as _};
