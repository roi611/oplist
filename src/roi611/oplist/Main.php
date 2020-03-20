<?php
    
    namespace roi611\oplist;
    
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;
use pocketmine\Player;
    
    class Main extends PluginBase implements Listener {
    
    public function onEnable() {
        $this->getLogger()->info("§e[起動] §4起動しました");
    }
    
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
        if(!$sender->isOp()){
            $sender->sendMessage("§cこのコマンドを使用する権限がありません");
            return true;
        }
        
    
        
        $ops = [];
        foreach($this->getServer()->getOps()->getAll() as $opName => $isOp){
            $ops[] = $opName;
        }
        $sender->sendMessage("§eOP:§9\n".implode("\n§9", $ops));
        
        return true;
        
        }
        
        public function onDisable() {
            $this->getLogger()->info("§4[終了] §6終了しています");
            
    }
}
