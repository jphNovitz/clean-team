import{o as s,d as l,b as u,f as t,a as e,c as m,w as n,F as p,e as f,t as i,H as h,h as o,L as c}from"./app.9995b85c.js";import{m as r}from"./matice.dff5312f.js";const g="/build/assets/cleaneuses_bw.d86fd9c9.webp",x={class:"relative flex flex-col items-top justify-center min-h-screen sm:items-center sm:pt-0"},k={key:0,class:"hidden fixed top-0 right-0 px-6 py-4 sm:block"},_={class:"flex flex-col w-full h-72 bg-main justify-start text-headline p-6"},b=e("h1",{class:"font-black text-2xl mb-6"}," consectetur adipiscing elit ",-1),y=e("h2",{class:"text-xl w-2/3 mb-6"}," Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis placerat leo id ante varius tincidunt. Suspendisse ut rutrum purus. Nulla tempus quis ligula id eleifend ",-1),w={class:"flex justify-start"},v={class:"md:w-auto px-3 py-3 md:py-0"},L=e("div",{class:"flex items-center justify-center w-full h-72 bg-gradient-to-r from-pink-50 to-pink-600"},[e("img",{src:g,class:"w-72 h-64 ml-12"}),e("h2",{class:"text-white ml-72 font-black text-xl p-12"}," Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis placerat leo id ante varius tincidunt. Suspendisse ut rutrum purus. Nulla tempus quis ligula id eleifend ")],-1),S={__name:"Welcome",props:{canLogin:Boolean,canRegister:Boolean,laravelVersion:String,phpVersion:String},setup(d){return(a,B)=>(s(),l(p,null,[u(t(h),{title:"Welcome"}),e("div",x,[d.canLogin?(s(),l("div",k,[a.$page.props.user?(s(),m(t(c),{key:0,href:a.route("dashboard"),class:"text-sm font-bold text-link-dark dark:text-gray-500 underline"},{default:n(()=>[o(i(t(r.trans)("app.Dashboard")),1)]),_:1},8,["href"])):(s(),l(p,{key:1},[u(t(c),{href:a.route("login"),class:"text-sm font-bold text-link-dark dark:text-gray-500 underline"},{default:n(()=>[o(i(t(r.trans)("auth.Login")),1)]),_:1},8,["href"]),d.canRegister?(s(),m(t(c),{key:0,href:a.route("register"),class:"ml-4 text-sm font-bold text-link-dark dark:text-gray-500 underline"},{default:n(()=>[o(i(t(r.trans)("auth.Register")),1)]),_:1},8,["href"])):f("",!0)],64))])):f("",!0),e("div",_,[b,y,e("div",w,[e("button",v,i(t(r.trans)("auth.Register")),1)])]),L])],64))}};export{S as default};