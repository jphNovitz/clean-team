import{r as D,u as T,o as v,c as x,w as t,h as o,t as a,f as e,a as i,b as n,n as C}from"./app.9995b85c.js";import{_ as g}from"./ActionSection.1cf3c8b4.js";import{_ as $}from"./ConfirmationModal.1f6092bc.js";import{_ as c}from"./DangerButton.561b78f9.js";import{_ as b}from"./SecondaryButton.f279d83e.js";import{m as s}from"./matice.dff5312f.js";import"./SectionTitle.1fb5c938.js";import"./_plugin-vue_export-helper.cdc0426e.js";import"./Modal.93a9b59f.js";const k={class:"max-w-xl text-sm text-gray-600"},w={class:"mt-5"},q={__name:"DeleteTeamForm",props:{team:Object},setup(_){const f=_,r=D(!1),l=T(),p=()=>{r.value=!0},d=()=>{l.delete(route("teams.destroy",f.team),{errorBag:"deleteTeam"})};return(y,m)=>(v(),x(g,null,{title:t(()=>[o(a(e(s.trans)("team.Delete_Team")),1)]),description:t(()=>[o(a(e(s.trans)("team.Delete_team_description")),1)]),content:t(()=>[i("div",k,a(e(s.trans)("team.Delete_team_confirm_once"))+". ",1),i("div",w,[n(c,{onClick:p},{default:t(()=>[o(a(e(s.trans)("team.Delete_Team")),1)]),_:1})]),n($,{show:r.value,onClose:m[1]||(m[1]=u=>r.value=!1)},{title:t(()=>[o(a(e(s.trans)("team.Delete_Team")),1)]),content:t(()=>[o(a(e(s.trans)("team.Delete_team_confirm_sure"))+". ",1)]),footer:t(()=>[n(b,{onClick:m[0]||(m[0]=u=>r.value=!1)},{default:t(()=>[o(a(e(s.trans)("btn.Cancel")),1)]),_:1}),n(c,{class:C(["ml-3",{"opacity-25":e(l).processing}]),disabled:e(l).processing,onClick:d},{default:t(()=>[o(a(e(s.trans)("team.Delete_Team")),1)]),_:1},8,["class","disabled"])]),_:1},8,["show"])]),_:1}))}};export{q as default};
