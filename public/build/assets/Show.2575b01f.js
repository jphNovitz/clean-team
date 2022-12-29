import{o as c,d as u,a,r as w,E as $,j as M,c as g,w as o,b as s,h as l,t as r,f as t,n as C,l as _,e as A,T as P,s as h,g as S,F as B,y as L}from"./app.a8813d1c.js";import{_ as j}from"./AppLayout.648821d8.js";import{_ as V}from"./ActionSection.a4e42761.js";import{_ as z}from"./Modal.4d4f2f09.js";import H from"./JournalManager.9be85ee6.js";import N from"./ProductManager.f27e8ef7.js";import{m as d}from"./matice.737db02d.js";import{_ as T}from"./Button.fec846ba.js";import{H as b}from"./Header2.fdb2fad1.js";import{r as E,a as F}from"./EllipsisVerticalIcon.9a164425.js";import"./_plugin-vue_export-helper.cdc0426e.js";import"./SectionTitle.663b3591.js";import"./JournalLine.0ac64575.js";import"./index.db144155.js";import"./Label.2d2ef3db.js";import"./Input.16f1d27c.js";import"./Checkbox.040faab5.js";import"./ActionMessage.7bc2f341.js";import"./ArrowPathIcon.7d86e584.js";import"./SecondaryButton.192acb98.js";import"./ProductLine.442391c2.js";import"./CreateProduct.2bb31658.js";function R(x,m){return c(),u("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor","aria-hidden":"true"},[a("path",{d:"M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z"}),a("path",{d:"M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z"})])}function q(x,m){return c(),u("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor","aria-hidden":"true"},[a("path",{d:"M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z"})])}const D={style:{position:"relative"}},I={href:"missing/archives",class:"inline-block w-full md:w-auto px-3 py-3 md:py-0 dark:text-white-custom"},J={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},O={class:"bg-white-custom text-paragraph dark:bg-smoky-black dark:text-white-custom p-5"},G={class:"flex flex-row justify-between items-start"},K={class:"grid grid-cols-3"},Q={class:"col-span-2 p-3"},U={class:"p-3"},W={key:1},gt={__name:"Show",setup(x){const m=w(!1),f=w(!1);var e=w(!1),v=$({available:[],products:M().props.value.initialProducts});function k(){axios.get(route("products_not_in_journal")).then(p=>{v.available=p.data})}function y(p){L.Inertia.put(route("add_product_in_journal"),{id:p},{preserveScroll:!0,resetOnSuccess:!1,onSuccess:()=>{console.log("success")}}),e=!1}return(p,i)=>(c(),g(j,{title:"Produits manquants"},{header:o(()=>[a("div",D,[s(b,null,{default:o(()=>[l(r(t(d.trans)("app.Products")),1)]),_:1}),a("div",{class:C(["absolute right-5 top-0 text-gray-800 flex w-7 h-7 overflow-hidden justify-end md:w-max md:h-auto md:flex-row items-start",{"w-max h-max flex-col-reverse bg-slate-50 border border-gray-200 rounded-lg":f.value}])},[a("button",{class:"inline-block w-full md:w-auto px-3 py-3 md:py-0 dark:text-white-custom",onClick:i[0]||(i[0]=_(n=>m.value=!m.value,["prevent"]))},[s(t(E),{class:"w-4 inline"}),l(" "+r(t(d.trans)("btn.Product_Manager")),1)]),a("a",I,[s(t(R),{class:"w-4 inline"}),l(" "+r(t(d.trans)("btn.Report")),1)]),a("button",{class:"inline-block self-end md:hidden px-3 py-1 md:py-0 dark:text-white-custom",onClick:i[1]||(i[1]=_(n=>f.value=!f.value,["prevent"]))},[s(t(F),{class:"w-5"})])],2)])]),default:o(()=>[a("div",null,[s(P,null,{default:o(()=>[m.value?(c(),g(N,{key:0})):A("",!0)]),_:1}),a("div",J,[s(V,{class:"mt-10 sm:mt-0"},{title:o(()=>[l(r(t(d.trans)("app.Missing_Products")),1)]),description:o(()=>[l(r(t(d.trans)("app.Missing_products_description")),1)]),content:o(()=>[s(H,{onShowAddModal:i[2]||(i[2]=n=>{h(e)?e.value=!t(e):e=!t(e),k()})})]),_:1})])]),s(z,{show:t(e)},{default:o(()=>[a("div",O,[a("div",G,[s(b,{class:"pb-5"},{default:o(()=>[l(r(t(d.trans)("btn.Add_product")),1)]),_:1}),a("button",{onClick:i[3]||(i[3]=_(n=>h(e)?e.value=!1:e=!1,["prevent"]))},[s(t(q),{class:"w-6"})])]),t(v).available?(c(!0),u(B,{key:0},S(t(v).available,n=>(c(),u("div",K,[a("div",Q,r(n.name)+" ("+r(n.id)+")",1),a("div",U,[s(T,{onClick:_(X=>{y(n.id),h(e)?e.value=!t(e):e=!t(e)},["prevent"])},{default:o(()=>[l(r(t(d.trans)("btn.Add")),1)]),_:2},1032,["onClick"])])]))),256)):(c(),u("div",W," Loading "))])]),_:1},8,["show"])]),_:1}))}};export{gt as default};
